<?php

namespace App\Models;

use App\Abstracts\Crud;
use App\Core\Database;
use PDO;

class Transaction extends Crud
{

    private PDO $DB;
    protected int $id_transaction;
    protected $date;
    protected int $transaction_check;
    protected float $amount;
    protected string $description;


    public function __construct()
    {
        $this->DB = Database::connexion();
    }

    /**
     * Get transaction by id
     *
     * @param integer $id
     * @return object|array
     */
    public function read(int $id): object|array
    {

        //Todo : get transaction from database

        return [];
    }

    /**
     * Get all transactions from database
     *
     * @return array
     */
    public function readAll(): array
    {

        try {
            $statement = $this->DB->prepare("SELECT * FROM transactions");
            $statement->execute();
            $transactions = $statement->fetchAll(PDO::FETCH_CLASS, self::class);

            return $transactions;
        } catch (\Throwable $th) {
            throw $th;
        }

        return [];
    }


    /**
     * delete transaction frome database
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool
    {
        //TODO : delete transaction frome database
        return true;
    }


    /**
     * Update transaction into database using the id of transaction
     *
     * @param integer $id
     * @param array $data
     * @return boolean
     */
    public function update(int $id, array $data): bool
    {
        return false;
    }


    /**
     * Create Databse into database
     *
     * @param array $data
     * @return boolean
     */
    public function create(array $data): bool
    {
        if (\is_array($data)) {
            //column1, column2, ....
            $columns = implode(", ", array_keys($data));

            // ?, ?, ...
            $placeholders = implode(', ', array_fill(0, count($data), '?'));

            //query 
            $query = "INSERT INTO transactions ($columns) VALUES ($placeholders)";

            //statment
            $statement = $this->DB->prepare($query);

            //execute statment 
            if ($statement->execute(array_values($data))) {
                return true;
            }
        }

        return false;
    }


    /**
     * Get transactions 
     *
     * @param string $column
     * @param mixed $value
     * @return object|boolean
     */
    public function where(string $column, mixed $value): object|bool
    {

        //TODO : get transaction with condition
        return false;
    }


    //! GETTERS AND SETTERS 
    public function getInt(): int
    {
        return $this->id_transaction;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getCheck(): int
    {
        return $this->transaction_check;
    }

    public function getDescription(): string
    {
        return $this->description;
    }


    public function getAmount(): float
    {
        return $this->amount;
    }
}
