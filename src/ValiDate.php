<?php

namespace hduarte77\ValiDate;

use \DateTimeImmutable;
use \DateTimeZone;

/**
 * Validate timestamps for time zones.
 *
 * Se valida si una fecha (DateTime) junto con un Offset proporcionado, son
 * válidos para una zona horaria especifica.
 */
class ValiDate {

   /**
     * Timestamp/TimeZone Validation using native php DateTime classes
     */
  public static function Check($date_str, $utc_offset, $time_zone_name){

		//crearmos una fecha de prueba a partir de los datos proporcionados
		$ff = $date_str . " -0" . ($utc_offset*-1) . ":00";
		$fechaT = new DateTimeImmutable($date_str, new DateTimeZone($time_zone_name));

		$fT = $fechaT->format("Y-m-d H:i:s");	//en formato string

		//creamos una fecha VALIDA para referencia con los datos proporcionados
		$fechaOK = new DateTimeImmutable($date_str, new DateTimeZone($time_zone_name));

		$fOk = $fechaOK->format("Y-m-d H:i:s"); //en formato string
		$fOk_offset = $fechaOK->getOffset()/60/60;


		//comparamos las fechas generadas
		return ( ($fT == $fOk && $utc_offset == $fOk_offset) ? true : false);

	}


}


