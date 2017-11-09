<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parserss extends CI_Controller {
    function __construct() {
        parent::__construct();        
        $this->load->library('rssparser');
        $this->load->model('rss_mdl');
    }
    
    public function left($str, $length) {
        return substr($str, 0, $length);
    }

    public function getSrcImage($image) {
        preg_match( '@src="([^"]+)"@' , $image, $match);
        $src = array_pop($match);
        return $src;
    }

    //Antara, detik
    public function grabXML_1($channel, $rss, $jml) {
        $rss = $this->rssparser->set_feed_url($rss)->set_cache_life(30)->getFeed($jml);

        $data = array();
        foreach ($rss as $item) {
            $descr = $item['description'];
            $separator = ">";
            $index = stripos($descr, $separator);
            $image_tmp = $this->left($descr, $index);
            $image = $this->getSrcImage($image_tmp);
            $title = $item['title'];
            $pubdate = date("Y-m-d H:i:s", strtotime($item['pubDate']));
            $link = $item['link'];
            $description = substr($item['description'],$index+1);

            $row = array(
                'image' => (string)$image,
                'title' => $title,
                'pubdate' => $pubdate,
                'link' => $link,
                'description' => $description,
                'channel' => $channel
            );
            $data[] = $row;
        }
        return $data;
    }

    //Okezone
    public function grabXML_2($channel, $rss, $jml) {
        $rss = $this->rssparser->set_feed_url($rss)->set_cache_life(30)->getFeed($jml);

        $data = array();
        foreach ($rss as $item) {
            $image = $item['image'];
            $title = $item['title'];
            $pubdate = date("Y-m-d H:i:s", strtotime($item['pubDate']));
            $link = $item['link'];
            $description = $item['description'];

            $row = array(
                'image' => (string)$image,
                'title' => $title,
                'pubdate' => $pubdate,
                'link' => $link,
                'description' => $description,
                'channel' => $channel
            );
            $data[] = $row;
        }
        return $data;
    }

    //Viva
    public function grabXML_3($channel, $rss, $jml) {
        $rss = $this->rssparser->set_feed_url($rss)->set_cache_life(30)->getFeed($jml);

        $data = array();
        foreach ($rss as $item) {
            $descr = $item['description'];
            $separator = ">";
            $index = stripos($descr, $separator);
            $image = $item['image'];
            $title = $item['title'];
            $pubdate = date("Y-m-d H:i:s", strtotime($item['pubDate']));
            $link = $item['link'];
            $description = substr($item['description'],$index+1);

            $row = array(
                'image' => (string)$image,
                'title' => $title,
                'pubdate' => $pubdate,
                'link' => $link,
                'description' => $description,
                'channel' => $channel
            );
            $data[] = $row;
        }
        return $data;
    }

    public function printAntaraNews(){
        $data = $this->grabXML_1('Antara', 'http://www.antaranews.com/rss/terkini', 10);
        foreach($data as $row) {
            echo "<strong>Image: </strong>".$row['image']; 
            echo "<BR><strong>Title: </strong>".$row['title'];   
            echo "<BR><strong>Publish: </strong>".$row['pubdate'];   
            echo "<BR><strong>Channel: </strong>".$row['channel'];   
            echo "<BR><strong>Link: </strong>".$row['link'];   
            echo "<BR><strong>Description: </strong>".$row['description'];  
            echo "<BR><BR><BR><BR>";               
        }
    }

    public function printDetikNews(){
        $data = $this->grabXML_1('Detik', 'http://rss.detik.com/index.php/detikcom', 10);
        foreach($data as $row) {
            echo "<strong>Image: </strong>".$row['image']; 
            echo "<BR><strong>Title: </strong>".$row['title'];   
            echo "<BR><strong>Publish: </strong>".$row['pubdate'];   
            echo "<BR><strong>Channel: </strong>".$row['channel'];   
            echo "<BR><strong>Link: </strong>".$row['link'];   
            echo "<BR><strong>Description: </strong>".$row['description'];  
            echo "<BR><BR><BR><BR>";               
        }
    }

    public function printOkezoneNews(){
        $data = $this->grabXML_2('Okezone', 'http://sindikasi.okezone.com/index.php/rss/0/RSS2.0', 10);
        foreach($data as $row) {
            echo "<strong>Image: </strong>".$row['image']; 
            echo "<BR><strong>Title: </strong>".$row['title'];   
            echo "<BR><strong>Publish: </strong>".$row['pubdate'];   
            echo "<BR><strong>Channel: </strong>".$row['channel'];   
            echo "<BR><strong>Link: </strong>".$row['link'];   
            echo "<BR><strong>Description: </strong>".$row['description'];  
            echo "<BR><BR><BR><BR>";               
        }
    }

    public function printVivaNews(){
        $data = $this->grabXML_3('Viva', 'http://rss.viva.co.id/get/all', 10);
        foreach($data as $row) {
            echo "<strong>Image: </strong>".$row['image']; 
            echo "<BR><strong>Title: </strong>".$row['title'];   
            echo "<BR><strong>Publish: </strong>".$row['pubdate'];   
            echo "<BR><strong>Channel: </strong>".$row['channel'];   
            echo "<BR><strong>Link: </strong>".$row['link'];   
            echo "<BR><strong>Description: </strong>".$row['description'];  
            echo "<BR><BR><BR><BR>";               
        }
    }

    public function valURLLink($link) {
        $rs = $this->rss_mdl->getByQuery("select * from rsstable where url_link = '".$link."'");    
        if($rs != "") {
            return false;
        } else {
            return true;
        }
    }

    public function insertRssAntara() {
        $rss = $this->grabXML_1('Antara', 'http://www.antaranews.com/rss/terkini', 100);
        foreach($rss as $row) {
            if($this->valURLLink($row['link'])) {
                $insert = array(
                    'title' => $row['title'],
                    'publish_date' => $row['pubdate'],
                    'url_link' => $row['link'],
                    'txt' => $row['description'],
                    'channel' => $row['channel'],
                    'img' => $row['image'],
                    'created_date' => date("Y-m-d H:i:s")
                );
                $this->rss_mdl->insert("rsstable", $insert);
            }
        }
    }

    public function insertRssDetik() {
        $rss = $this->grabXML_1('Detik', 'http://rss.detik.com/index.php/detikcom', 100);
        foreach($rss as $row) {
            if($this->valURLLink($row['link'])) {
                $insert = array(
                    'title' => $row['title'],
                    'publish_date' => $row['pubdate'],
                    'url_link' => $row['link'],
                    'txt' => $row['description'],
                    'channel' => $row['channel'],
                    'img' => $row['image'],
                    'created_date' => date("Y-m-d H:i:s")
                );
                $this->rss_mdl->insert("rsstable", $insert);
            }
        }
    }

    public function insertRssOkezone() {
        $rss = $this->grabXML_2('Okezone', 'http://sindikasi.okezone.com/index.php/rss/0/RSS2.0', 100);
        foreach($rss as $row) {
            if($this->valURLLink($row['link'])) {
                $insert = array(
                    'title' => $row['title'],
                    'publish_date' => $row['pubdate'],
                    'url_link' => $row['link'],
                    'txt' => $row['description'],
                    'channel' => $row['channel'],
                    'img' => $row['image'],
                    'created_date' => date("Y-m-d H:i:s")
                );
                $this->rss_mdl->insert("rsstable", $insert);
            }
        }
    }

    public function insertRssViva() {
        $rss = $this->grabXML_3('Viva', 'http://rss.viva.co.id/get/all', 100);
        foreach($rss as $row) {
            if($this->valURLLink($row['link'])) {
                $insert = array(
                    'title' => $row['title'],
                    'publish_date' => $row['pubdate'],
                    'url_link' => $row['link'],
                    'txt' => $row['description'],
                    'channel' => $row['channel'],
                    'img' => $row['image'],
                    'created_date' => date("Y-m-d H:i:s")
                );
                $this->rss_mdl->insert("rsstable", $insert);
            }
        }
    }

    public function doSyncRSS() {
        $rs = $this->rss_mdl->getByQuery("select * from rsstable where is_sent = 0 limit 10");    
        if($rs != "") {
            foreach($rs as $row) {
                $this->sendRSSToAppsServer(
                    $row->title, $row->publish_date, $row->url_link, $row->txt, 
                    $row->channel, $row->img
                );
                $update = array(
                    'is_sent' => 1,
                    'sent_date' => date("Y-m-d H:i:s")
                );
                $this->rss_mdl->update("rsstable", $update, "url_link = '".$row->url_link."'");
            }
        }        
    }

    public function sendRSSToAppsServer(
            $title, $publish_date, $url_link, $txt, $channel, $img
        ) {
        $url = 'https://serve01.molecool.id/api/v1/news/import';
        $fields = array(
            'title' => urlencode($title),
            'pubDate' => urlencode($publish_date),
            'tags' => "",
            'description' => urlencode($txt),
            'enclosure' => urlencode($url_link),
            'link' => urlencode($img)
        );

        //url-ify the data for the POST
        $fields_string = "";
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

        //execute post
        $result = curl_exec($ch);

        //close connection
        curl_close($ch);
    }
}	