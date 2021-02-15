<?php

class Constants {
  
  const STATUS_VERY_HIGH = 'Very High';
  const STATUS_HIGH = 'High';
  const STATUS_MEDIUM = 'Medium';
  const STATUS_LOW = 'Low';

  public static function getStatusVeryHigh() 
  {
    return self::STATUS_VERY_HIGH;
  }

  public static function getStatusHigh()
  {
    return self::STATUS_HIGH;
  }

  public static function getStatusMedium() 
  {
    return self::STATUS_MEDIUM;
  }

  public static function getStatusLow()
  {
    return self::STATUS_LOW;
  }

}