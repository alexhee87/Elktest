<?php

class ImageProperties{

    public  $sitename;
    public  $local_path;
    public  $picture_name;
    public  $ext_type;
    public  $size;
    public  $dimension_x;
    public  $dimension_y;

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getSitename()
    {
        return $this->sitename;
    }

    /**
     * @param mixed $sitename
     */
    public function setSitename($sitename)
    {
        $this->sitename = $sitename;
    }

    /**
     * @return mixed
     */
    public function getLocalPath()
    {
        return $this->local_path;
    }

    /**
     * @param mixed $local_path
     */
    public function setLocalPath($local_path)
    {
        $this->local_path = $local_path;
    }

    /**
     * @return mixed
     */
    public function getPictureName()
    {
        return $this->picture_name;
    }

    /**
     * @param mixed $picture_name
     */
    public function setPictureName($picture_name)
    {
        $this->picture_name = $picture_name;
    }

    /**
     * @return mixed
     */
    public function getExtType()
    {
        return $this->ext_type;
    }

    /**
     * @param mixed $ext_type
     */
    public function setExtType($ext_type)
    {
        $this->ext_type = $ext_type;
    }


    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getDimensionX()
    {
        return $this->dimension_x;
    }

    /**
     * @param mixed $dimension_x
     */
    public function setDimensionX($dimension_x)
    {
        $this->dimension_x = $dimension_x;
    }

    /**
     * @return mixed
     */
    public function getDimensionY()
    {
        return $this->dimension_y;
    }

    /**
     * @param mixed $dimension_y
     */
    public function setDimensionY($dimension_y)
    {
        $this->dimension_y = $dimension_y;
    }


}
?>