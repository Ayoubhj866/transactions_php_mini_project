<?php

namespace App\Models;

use App\Abstracts\Crud;
use App\Core\Database;
use DateTime;
use PDO;

class User extends Crud
{

    private PDO $DB;
    protected int $id_user;
    protected string $username;
    protected string $email;
    protected string $role;
    protected string $password;
    protected bool $status;
    protected $created_at;

    public function __construct()
    {
        $this->DB = Database::connexion();
    }

    /**
     * Read All users from database
     *
     * @return array
     */
    public function readAll(): array
    {
        $statement = $this->DB->prepare("SELECT * FROM users");
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $users;
    }

    /**
     * get user with condition
     *
     * @param string $column
     * @param mixed $value
     * @return object|boolean
     */
    public function where(string $column, mixed $value): object|bool
    {
        $statement = $this->DB->prepare("SELECT * FROM users WHERE $column=?");
        $statement->execute([trim($value)]);
        $user = $statement->fetchObject(self::class);

        return $user;
    }

    /**
     * Create new user in database
     *
     * @param array $data
     * @return boolean
     */
    public function create(array $data): bool
    {
        try {
            //table columns
            $tableCulumns = implode(" ,", array_keys($data));

            // ?,?,....
            $values = implode(', ', array_fill(0, count($data), '?'));

            //query
            $query = "INSERT INTO users ($tableCulumns) VALUES ($values)";

            $statement = $this->DB->prepare($query);

            //execute statement
            $statement->execute(array_values($data));
        } catch (\Throwable $th) {
            throw $th;
        }
        return true;
    }

    /**
     * Read an specific user from database
     *
     * @param integer $id
     * @return object|array
     */
    public function read(int $id): object|array
    {
        return [];
    }

    /**
     * Update an specific user in database
     *
     * @param integer $id
     * @param array $data
     * @return boolean
     */
    public function update(int $id, array $data): bool
    {
        if (is_array($data)) {
            $columns = [];
            foreach ($data as $key => $value) {
                $columns[] = "$key =?";
            }

            $query = "UPDATE users SET  " . implode(', ', $columns) .  " WHERE id_user =?";
            $statement = $this->DB->prepare($query);
            return $statement->execute(array_values(array_merge($data, ['id' => $id]))) === true ? true : false;
        }

        return false;
    }


    /**
     * Delete an specific user from database
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool
    {
        if(self::where('id_user' , (int)$id) !== false) {
            //delete this user
            $query = "DELETE FROM users WHERE id_user=?" ;
            $statement = $this->DB->prepare($query) ;
            if($statement->execute([$id])) {
                return true ;
            }
        }
        return false;
    }


    // ! GETTERS AND SETTERS
    public function getId(): int
    {
        return $this->id_user;
    }

    public function getUsername(): string
    {
        return $this->username;
    }


    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getStatus(): bool
    {
        return $this->status;
    }

    public function createdAt()
    {
        return $this->created_at;
    }
}
