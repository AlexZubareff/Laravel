<?php
declare(strict_types=1);

namespace App\Services;

use App\Contracts\Parser as Contract;
use App\Models\Source;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as Parser;
use App\Models\News;


class ParserService implements Contract
{
    protected string $url;
    protected array $dataParse;

    /**
     * @param string $url
     * @return ParserService
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        if($this->url == 'https://news.yandex.ru/music.rss') {
            $xml = Parser::load($this->url);
            return $xml->parse([
                'title' => [
                    'uses' =>'channel.title'
                ],
                'link' => [
                    'uses' =>'channel.link'
                ],
                'image' => [
                    'uses' =>'channel.image.url'
                ],
                'description' => [
                    'uses' =>'channel.description'
                ],
                'news' => [
                    'uses' =>'channel.item[title,link,guid,description,pubDate]'
                ],
            ]);


        } elseif ($this->url == 'https://news.yandex.ru/army.rss') {
            $xml = Parser::load($this->url);
            return $xml->parse([
                'title' => [
                    'uses' =>'channel.title'
                ],
                'link' => [
                    'uses' =>'channel.link'
                ],
                'image' => [
                    'uses' =>'channel.image.url'
                ],
                'description' => [
                    'uses' =>'channel.description'
                ],
                'news' => [
                    'uses' =>'channel.item[title,link,guid,description,pubDate]'
                ],
            ]);
        }elseif ($this->url == 'https://news.yandex.ru/sport.rss') {
            $xml = Parser::load($this->url);
            return $xml->parse([
                'title' => [
                    'uses' =>'channel.title'
                ],
                'link' => [
                    'uses' =>'channel.link'
                ],
                'image' => [
                    'uses' =>'channel.image.url'
                ],
                'description' => [
                    'uses' =>'channel.description'
                ],
                'news' => [
                    'uses' =>'channel.item[title,link,guid,description,pubDate]'
                ],
            ]);
        }elseif ($this->url == 'https://news.yandex.ru/business.rss') {
            $xml = Parser::load($this->url);
            return $xml->parse([
                'title' => [
                    'uses' =>'channel.title'
                ],
                'link' => [
                    'uses' =>'channel.link'
                ],
                'image' => [
                    'uses' =>'channel.image.url'
                ],
                'description' => [
                    'uses' =>'channel.description'
                ],
                'news' => [
                    'uses' =>'channel.item[title,link,guid,description,pubDate]'
                ],
            ]);
        }elseif ($this->url == 'https://news.yandex.ru/politics.rss') {
            $xml = Parser::load($this->url);
            return $xml->parse([
                'title' => [
                    'uses' =>'channel.title'
                ],
                'link' => [
                    'uses' =>'channel.link'
                ],
                'image' => [
                    'uses' =>'channel.image.url'
                ],
                'description' => [
                    'uses' =>'channel.description'
                ],
                'news' => [
                    'uses' =>'channel.item[title,link,guid,description,pubDate]'
                ],
            ]);
        }
        return [];
    }

    /**
     * @param $dataParse
     * @param Source $source
     * @return array
     */
    public function saveParseData($dataParse, Source $source):array
    {

        foreach ($dataParse['news'] as $item)
        {
            News::create([
                'title'=> $item['title'],
                'description' => $item['description'],
                'news_url'=> $item['link'],
                'source_id' => implode($source->only('id')),
                'category_id' => implode($source->only('id'))
            ]);

        }
        return [];
    }

    public function saveData(): void
    {
        $xml = Parser::load($this->url);
        $data = $xml->parse([
            'title' => [
                'uses' =>'channel.title'
            ],
            'link' => [
                'uses' =>'channel.link'
            ],
            'image' => [
                'uses' =>'channel.image.url'
            ],
            'description' => [
                'uses' =>'channel.description'
            ],
            'news' => [
                'uses' =>'channel.item[title,link,guid,description,pubDate]'
            ],
        ]);
        $json = json_encode($data);
        $e = explode("/", $this->url);
        $fileName = end($e);
        Storage::append('news/'.$fileName, $json);
    }
}
