<?php

namespace App\Helpers;

use DateTime;

class CsvHelper
{

    public static function csvHandler(string $file): array|false
    {
        $handle = fopen($file, "r");

        $isFirstRow = true;
        $data = [];

        // Lire et traiter le contenu du fichier CSV
        while (($rows = fgetcsv($handle, 1000, ",")) !== FALSE) {
            //ignore the first row (header)
            if ($isFirstRow) {
                $isFirstRow = false;
                continue;
            }
            $data[] = [
                "date" => DateTime::createFromFormat("d/m/Y" , $rows[0])->format("Y-m-d"),
                "transaction_check" => (int) $rows[1],
                "description" => $rows[2],
                "amount" => (float) preg_replace('/[^0-9.]/', '', $rows[3])
            ];
        }
        fclose($handle);

        return $data;
    }


    public static function stringToDate($StringDate)
    {
        if (\is_string($StringDate)) {

            $date = new DateTime($StringDate);

            return $formattedDate = $date->format('Y-m-d');
        }
    }
}
