<?php

class Cms extends \Eloquent
{

    /* arbitrary data */
    protected $content = array(
        'page' => array(
            0 => array(
                'title' => 'Privacy Policy',
                'content' => 'Lorem ipsom dolar'
            ),
            1 => array(
                'title' => 'About us',
                'content' => 'Lorem ipsom dolar'
            ),
            2 => array(
                'title' => 'Contact Us',
                'content' => '<input /> <button>Go</button>'
            ),
        ),
        'post' => array(
            0 => array(
                'title' => 'Hello, World',
                'content' => 'Lorem ipsom dolar'
            ),
            1 => array(
                'title' => 'Test post',
                'content' => 'Lorem ipsom dolar'
            ),
            2 => array(
                'title' => 'Another entry',
                'content' => 'Lorem ipsom <a href="http://loremipsom.com">dolar</a>'
            ),
        )
    );

    function __construct()
    {
        /* @TODO populate content object */
        $this->content = json_decode(json_encode($this->content));
    }

    /**
     * @param $type entity type
     * @return bool
     */
    public function isAvailable($type)
    {
        return isset($this->content->{$type});
    }

    /**
     * @param $type entity type
     * @param $id entity id
     * @return bool
     */
    public function isView($type, $id)
    {
        return isset($this->content->{$type}[$id]);
    }

    /**
     * @param $type entity type
     * @return mixed
     */
    public function getList($type)
    {
        return $this->content->{$type};
    }

    /**
     * @param $type entity type
     * @param $id entity id
     * @return mixed
     */
    public function getView($type, $id)
    {
        return $this->content->{$type}[$id];
    }

}