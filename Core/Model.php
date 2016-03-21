<?php
/**
 * Created by PhpStorm.
 * User: igortokman
 * Date: 21.03.16
 * Time: 0:37
 */

namespace Core;


class Model
{
    public $monitor;
    /**
     * Model constructor.
     */
    public function __construct(SiteSearch $monitor)
    {
        $this->monitor = $monitor;
    }

    /**
     * Returns an array of test results
     * @return array
     */
    public function checkOut(){

        $inspections[] = array(
            'title' => 'Проверка наличия файла ' . $this->monitor->fileName,
            'status' => $this->monitor->fileExistence()? 'OK' : 'Ошибка',
            'extra' => 'Состояние',
            'state' => $this->monitor->fileExistence()? 'Файл ' . $this->monitor->fileName .' присутствует': 'Файл ' . $this->monitor->fileName .' отсутствует',
            'recom' => $this->monitor->fileExistence()? 'Доработки не требуются' : 'Программист: Создать файл ' . $this->monitor->fileName .' и разместить его на сайте.'
        );

        $inspections[] = array(
            'title' => 'Проверка указания директивы Host',
            'status' => $this->monitor->directiveExistence('Host')? 'OK' : 'Ошибка',
            'extra' => 'Состояние',
            'state' => $this->monitor->directiveExistence('Host')? 'Директива Host указана': 'В файле ' . $this->monitor->fileName .' не указана директива Host',
            'recom' => $this->monitor->directiveExistence('Host')? 'Доработки не требуются' : 'Программист: Для того, чтобы поисковые системы знали, какая версия сайта является основных зеркалом, необходимо прописать адрес основного зеркала в директиве Host. В данный момент это не прописано. Необходимо добавить в файл ' . $this->monitor->fileName .' директиву Host. Директива Host задётся в файле 1 раз, после всех правил.'
        );

        $inspections[] = array(
            'title' => 'Проверка количества директив Host, прописанных в файле',
            'status' => $this->monitor->directiveCount('Host') === 1? 'OK' : 'Ошибка',
            'extra' => 'Состояние',
            'state' => $this->monitor->directiveCount('Host') === 1? 'В файле прописана 1 директива Host': 'В файле прописано несколько директив Host',
            'recom' => $this->monitor->directiveCount('Host') === 1? 'Доработки не требуются' : 'Программист: Директива Host должна быть указана в файле толоко 1 раз. Необходимо удалить все дополнительные директивы Host и оставить только 1, корректную и соответствующую основному зеркалу сайта'
        );

        $inspections[] = array(
            'title' => 'Проверка размера файла ' . $this->monitor->fileName,
            'status' => $this->monitor->getSize() <= 32? 'OK' : 'Ошибка',
            'extra' => 'Состояние',
            'state' => $this->monitor->getSize() <= 32? 'Размер файла ' . $this->monitor->fileName .' составляет ' . $this->monitor->getSize() . ', что находится в пределах допустимой нормы' :
                'Размера файла ' . $this->monitor->fileName .' составляет ' . $this->monitor->getSize() . ', что превышает допустимую норму',
            'recom' => $this->monitor->getSize() <= 32? 'Доработки не требуются' : 'Программист: Максимально допустимый размер файла ' . $this->monitor->fileName .' составляем 32 кб. Необходимо отредактировть файл ' . $this->monitor->fileName .' таким образом, чтобы его размер не превышал 32 Кб'
        );


        $inspections[] = array(
            'title' => 'Проверка указания директивы Sitemap',
            'status' => $this->monitor->directiveExistence('Sitemap')? 'OK' : 'Ошибка',
            'extra' => 'Состояние',
            'state' => $this->monitor->directiveExistence('Sitemap')? 'Директива Sitemap указана': 'В файле ' . $this->monitor->fileName .' не указана директива Sitemap',
            'recom' => $this->monitor->directiveExistence('Sitemap')? 'Доработки не требуются' : 'Программист: Добавить в файл ' . $this->monitor->fileName .' директиву Sitemap'
        );

        $inspections[] = array(
            'title' => 'Проверка кода ответа сервера для файла ' . $this->monitor->fileName ,
            'status' => $this->monitor->getHeader('http_code') === 200? 'OK' : 'Ошибка',
            'extra' => 'Состояние',
            'state' => $this->monitor->getHeader('http_code') === 200? 'Файл ' . $this->monitor->fileName .' отдаёт код ответа сервера 200':
                'При обращении к файлу ' . $this->monitor->fileName .' сервер возвращает код ответа ' . $this->monitor->getHeader('http_code'),
            'recom' => $this->monitor->getHeader('http_code') === 200? 'Доработки не требуются' : 'Программист: Файл ' . $this->monitor->fileName .' должны отдавать код ответа 200, иначе файл не будет обрабатываться. Необходимо настроить сайт таким образом, чтобы при обращении к файлу sitemap.xml сервер возвращает код ответа 200'
        );

        return $inspections;
    }
}