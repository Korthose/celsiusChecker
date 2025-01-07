<?php

namespace Model;

use PDO;

class temperature
{
    private $id;
    private $celsius;
    private $fahrenheit;
    private $date;
    private $time;
    private $humidity;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCelsius()
    {
        return $this->celsius;
    }

    /**
     * @return mixed
     */
    public function getFahrenheit()
    {
        return $this->fahrenheit;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return mixed
     */
    public function getHumidity()
    {
        return $this->humidity;
    }

    public function __construct($id, $celsius, $fahrenheit, $date, $time, $humidity)
    {
        $this->id = $id;
        $this->celsius = $celsius;
        $this->fahrenheit = $fahrenheit;
        $this->date = $date;
        $this->time = $time;
        $this->humidity = $humidity;
    }

    public static function fetchAll()
    {
        $pdo = getPDO();
        $stmt = $pdo->query("SELECT * FROM temperatures");
        $items = $stmt->fetchAll();
        $fetchAll = [];

        foreach ($items as $item) {
            $fetchAll[$item['id']] = new temperature($item['id'],
                $item['celsius'],
                $item['fahrenheit'],
                $item['humidity'],
                $item['date'],
                $item['time']);
        }

        return $fetchAll;
    }

    public static function last5Days($count)
    {
        $pdo = getPDO();
        $summary = [];

        $stmt = $pdo->prepare("SELECT 
    ROUND(AVG(celsius), 2) AS 'avg_celsius', 
    ROUND(AVG(fahrenheit), 2) AS 'avg_fahrenheit', 
    ROUND(AVG(humidity), 0) AS 'avg_humidity', 
    ROUND(MAX(celsius), 2) AS 'max_celsius', 
    ROUND(MAX(fahrenheit), 2) AS 'max_fahrenheit', 
    ROUND(MIN(celsius), 2) AS 'min_celsius', 
    ROUND(MIN(fahrenheit), 2) AS 'min_fahrenheit', 
    DATE(date) AS 'date'
    FROM (
        SELECT DISTINCT DATE(date) AS unique_date 
        FROM temperatures 
        WHERE DATE(date) < CURDATE() 
        ORDER BY unique_date DESC 
        LIMIT ?
    ) AS recent_dates
        JOIN temperatures ON DATE(temperatures.date) = recent_dates.unique_date
        GROUP BY DATE(temperatures.date)
        ORDER BY DATE(temperatures.date);

");
        $stmt->execute([$count]);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($items as $item) {
            $summary[$item['date']] = [
                'avg_celsius' => $item['avg_celsius'],
                'avg_fahrenheit' => $item['avg_fahrenheit'],
                'avg_humidity' => $item['avg_humidity'],
                'min_celsius' => $item['min_celsius'],
                'min_fahrenheit' => $item['min_fahrenheit'],
                'max_celsius' => $item['max_celsius'],
                'max_fahrenheit' => $item['max_fahrenheit'],
            ];
        }

        return $summary;
    }

    public static function newestTemperature()
    {
        $pdo = getPDO();
        $stmt = $pdo->query('SELECT celsius, fahrenheit, humidity FROM temperatures ORDER BY id DESC LIMIT 1');

        $currentTemperature = $stmt->fetch();
        return $currentTemperature;
    }


}