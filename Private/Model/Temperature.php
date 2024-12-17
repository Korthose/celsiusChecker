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

    public static function last5Days($count){
        $pdo = getPDO();
        $last5Days = [];
        $stmt = $pdo->prepare("SELECT AVG(celsius) as 'avg_celsius', AVG(fahrenheit) as 'avg_fahrenheit', AVG(humidity) AS 'avg_humidity', 
                                     MAX(celsius) as 'max_celsius', MAX(fahrenheit) as 'max_fahrenheit',
                                     MIN(celsius) as min_celsius, MIN(fahrenheit) as min_fahrenheit, date 
                                     FROM temperatures WHERE date < NOW() - INTERVAL ? DAY;");

        for ($i = 0; $i <= $count; $i++){
            if (!$stmt->execute([$i])) {
                return null;
            }

            $summary = $stmt->fetch();
            $last5Days[$summary['date']] = array($summary['avg_celsius'], $summary['avg_fahrenheit'], $summary['avg_humidity'],
                             $summary['max_celsius'], $summary['max_fahrenheit'], $summary['min_celsius'],
                             $summary['min_fahrenheit'], $summary['date']);
        }

        return $last5Days;
    }

    public static function newestTemperature()
    {
        $pdo = getPDO();
        $stmt = $pdo->query('SELECT celsius, fahrenheit, humidity FROM temperatures ORDER BY id DESC LIMIT 1');

        $currentTemperature = $stmt->fetch();
        return $currentTemperature;
    }


}