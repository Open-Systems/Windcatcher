<?php
define("constao" , 661.48);  // speed of sound at sea level, knots
define("constPo" , 2116.22);  // sea level value of pressure in standard atmosphere, lb/ft2
define("constTo" , 288.15);  // sea level value of absolute temperature in standard atmosphere, K (518.67 R)
define("constRho" , 0.0023769);  // sea level value of density in standard atmosphere, slug/ft3
define("constGammaAir" , 1.4);  // ratio of specific heats for air
define("constg" , 32.17405);  // acceleration due to gravity, ft/sec2
define("constLo" , -0.0019812);  // standard lapse rate in troposhere, C/ft (-0.003566 R/ft)
define("constOATstratK" , 216.66);  // OAT in stratosphere, K
define("constR" , 3089.67);  // gas constant, dry air, ft2/s2/K
define("contPaSLinHg" , 29.92126);  // atmospheric pressure at sea level, in Hg
define("constTKZeroC" , 273.15);  // Temperature in Kelvin at zero Celisus, K
define("constTRZeroF" , 459.67);  // Temperature in Rankine at zero Fahrenheit, R
define("constRadiusEarth" , 20930000);  // Radius earth, feet
define("FPS_TO_KNOTS" , 0.592483801295896);  // ft/sec to knots
define("FPS_TO_MPH" , 0.681818181818182);  // ft/sec to miles/hour
define("FPS_TO_KPH" , 1.09728);  // ft/sec to Kilometers/hour
define("FEET_TO_METERS" , 0.3048);  // feet to meters
define("INHG_TO_PSF" , 70.72619);  // inches Hg to lb/ft2
define("MB_TO_PSF" , 2.0885434);  // millibars to lb/ft2
define("PSI_TO_PSF" , 144);  // lb/in2 to lb/ft2
define("K_TO_R" , 1.8);  // Kelvin to Rankine
define("constK1" , 0.00000687535);  // From Herrington, Ch. 1, Page 4, per geopotential feet
define("constK2" , -0.0000480637);  // From Herrington, Ch. 1, Page 4, per geopotential feet
define("constK3" , 36089.24);  // From Herrington, Ch. 1, Page 4, altitude of tropopause, geopotential feet
define("constKdeltaTrop" , 5.2561);  // From Herrington, Ch. 1, Page 4, per geopotential feet
define("constKdeltaStrat" , 0.22336);  // From Herrington, Ch. 1, Page 4, per geopotential feet
define("constMachEpsilon" , 0.000001);  // Arbitrary convergence epsilon for$Mach convergence at supersonic speeds
define("constKCASEpsilon" , 0.001);  // Arbitrary convergence epsilon for $KCAS convergence at supersonic speeds
define("PSF_TO_NSM", 47.880258); // lb/ft2 to N/m2 
define("SLUGPERFT3_TO_KGPERM3" , 515.378818); //Slug/ft3 to kg/m3 
define("constBETAVISC" , 0.000001458); //Reynolds calculation constant, N-sec/(sq.m-sqrt(kelvins) 
define("constSUTH", 110.4); //Sutherland's constant, kelvins

function AtmoSpdSnd_FPS_fOATKelvin($TKelvin){
    return (constGammaAir * constR * $TKelvin) ^ (1 / 2);
}

function AtmoSpdSnd_KTS_fOATKelvin($TKelvin){
    return  AtmoSpdSnd_FPS_fOATKelvin($TKelvin) * FPS_TO_KNOTS;
}

function AtmoSpdSnd_MPH_fOATKelvin($TKelvin){
    return  AtmoSpdSnd_FPS_fOATKelvin($TKelvin) * FPS_TO_MPH;
}

function AtmoSpdSnd_KPH_fOATKelvin($TKelvin){
    return  AtmoSpdSnd_FPS_fOATKelvin($TKelvin) * FPS_TO_KPH;
}

function AtmoSpdSnd_mps_fOATKelvin($TKelvin){
    return  AtmoSpdSnd_FPS_fOATKelvin($TKelvin) * FEET_TO_METERS;
}

function AtmoSpdSnd_FPS_fOATCelsius($TCelsius){
    return  AtmoSpdSnd_FPS_fOATKelvin(AtmoConvCtoK($TCelsius));
}
/// next set

function AtmoSpdSnd_KTS_fOATCelsius($TCelsius){
    return  AtmoSpdSnd_KTS_fOATKelvin(AtmoConvCtoK($TCelsius));
}

function AtmoSpdSnd_MPH_fOATCelsius($TCelsius){
    return  AtmoSpdSnd_MPH_fOATKelvin(AtmoConvCtoK($TCelsius));
}

function AtmoSpdSnd_KPH_fOATCelsius($TCelsius){
    return AtmoSpdSnd_KPH_fOATKelvin(AtmoConvCtoK($TCelsius));
}

function AtmoSpdSnd_mps_fOATCelsius($TCelsius){
    return AtmoSpdSnd_mps_fOATKelvin(AtmoConvCtoK($TCelsius));
}


function AtmoSpdSnd_FPS_fOATFahrenheit($TFahrenheit){
    return AtmoSpdSnd_FPS_fOATKelvin(AtmoConvFtoK($TFahrenheit));
}

function AtmoSpdSnd_KTS_fOATFahrenheit($TFahrenheit){
    return AtmoSpdSnd_KTS_fOATKelvin(AtmoConvFtoK($TFahrenheit));
}

function AtmoSpdSnd_MPH_fOATFahrenheit($TFahrenheit){
    return AtmoSpdSnd_MPH_fOATKelvin(AtmoConvFtoK($TFahrenheit));
}

function AtmoSpdSnd_KPH_fOATFahrenheit($TFahrenheit){
    return AtmoSpdSnd_KPH_fOATKelvin(AtmoConvFtoK($TFahrenheit));
}

function AtmoSpdSnd_mps_fOATFahrenheit($TFahrenheit){
    return AtmoSpdSnd_mps_fOATKelvin(AtmoConvFtoK($TFahrenheit));
}

function AtmoSpdSnd_FPS_fOATRankine($TRankine){
    return AtmoSpdSnd_FPS_fOATKelvin(AtmoConvRtoK($TRankine));
}

function AtmoSpdSnd_KTS_fOATRankine($TRankine){
    return AtmoSpdSnd_KTS_fOATKelvin(AtmoConvRtoK($TRankine));
}

function AtmoSpdSnd_MPH_fOATRankine($TRankine){
    return AtmoSpdSnd_MPH_fOATKelvin(AtmoConvRtoK($TRankine));
}

function AtmoSpdSnd_KPH_fOATRankine($TRankine){
    return AtmoSpdSnd_KPH_fOATKelvin(AtmoConvRtoK($TRankine));
}

function AtmoSpdSnd_mps_fOATRankine($TRankine){
    return AtmoSpdSnd_mps_fOATKelvin(AtmoConvRtoK($TRankine));
}

function AtmoSpdSndSTD_FPS_fHp($Hp){
    return AtmoSpdSnd_FPS_fOATKelvin(AtmoTSTD_Kelvin_fHp($Hp));
}

function AtmoSpdSndSTD_KTS_fHp($Hp){
    return AtmoSpdSndSTD_FPS_fHp($Hp) * FPS_TO_KNOTS;
}

function AtmoSpdSndSTD_MPH_fHp($Hp){
    return AtmoSpdSndSTD_FPS_fHp($Hp) * FPS_TO_MPH;
}

function AtmoSpdSndSTD_kph_fHp($Hp){
    return AtmoSpdSndSTD_FPS_fHp($Hp) * FPS_TO_KPH;
}

function AtmoSpdSndSTD_mps_fHp($Hp){
    return AtmoSpdSndSTD_FPS_fHp($Hp) * FEET_TO_METERS;
}

function AtmoTSTD_Kelvin_fHp($Hp){
    if ($Hp < constK3){
        return constTo + $Hp * constLo;
    }else{
        return constOATstratK;
    }      
}

function AtmoTSTD_Celsius_fHp($Hp){
    return AtmoConvKtoC(AtmoTSTD_Kelvin_fHp($Hp));
}

function AtmoTSTD_Fahrenheit_fHp($Hp){
    return AtmoConvKtoF(AtmoTSTD_Kelvin_fHp($Hp));
}

function AtmoTSTD_Rankine_fHp($Hp){
    return AtmoConvKtoR(AtmoTSTD_Kelvin_fHp($Hp));
}

function AtmoTapelineAlt_feet_fGeoptlAlt($Hgeopotl){
    return $Hgeopotl * (1 + $Hgeopotl / (constRadiusEarth - $Hgeopotl));
}

function AtmoTapelineAlt_meters_fGeoptlAlt($Hgeopotl){
    return AtmoTapelineAlt_feet_fGeoptlAlt($Hgeopotl / FEET_TO_METERS) * FEET_TO_METERS;
}

function AtmoGeoptlAlt_feet_fTapelineAlt($htape){
    return $htape * constRadiusEarth / ($htape + constRadiusEarth);
}

function AtmoGeoptlAlt_meters_fTapelineAlt($htape){
    return AtmoGeoptlAlt_feet_fTapelineAlt($htape / FEET_TO_METERS) * FEET_TO_METERS;
}

function AtmoThetaSTD_fHp($Hp){
    return AtmoTSTD_Kelvin_fHp($Hp) / constTo;
}

function AtmoSigmaSTD_fHp($Hp){
    return AtmoDelta_fHp($Hp) / AtmoThetaSTD_fHp($Hp);
}

function AtmoDelta_fHp($Hp){
    if ($Hp < constK3){
        return (1 - $Hp * constK1) ^ constKdeltaTrop;
    }else{
        return constKdeltaStrat * exp(constK2 * ($Hp - constK3));
    }
}

function AtmoPstatic_PSF_fHp($Hp){
    return constPo * AtmoDelta_fHp($Hp);
}

function AtmoPstatic_InHg_fHp($Hp){
    return AtmoPstatic_PSF_fHp($Hp) / INHG_TO_PSF;
}

function AtmoPstatic_MB_fHp($Hp){
    return AtmoPstatic_PSF_fHp($Hp) / MB_TO_PSF;
}

function AtmoPstatic_PSI_fHp($Hp){
    return AtmoPstatic_PSF_fHp($Hp) / PSI_TO_PSF;
}

function AtmoRhoSTD_SlugPerft3_fHp($Hp){
    return constRho * AtmoSigmaSTD_fHp($Hp);
}

function AtmoRho_SlugPerft3_fHpOATCelsius($Hp,$OATC){
    return constRho * AtmoSigma_fOATCelsiusHp($OATC, $Hp);
}

function AtmoRho_SlugPerft3_fHpOATKelvin($HP, $OATK){
    return constRho * AtmoSigma_fOATKelvinHp($OATK, $HP);
}

function AtmoRho_SlugPerft3_fHpOATRankine($HP, $OATR){
    return constRho * AtmoSigma_fOATRankineHp($OATR, $HP);
}

function AtmoRho_SlugPerft3_fHpOATFahrenheit($HP, $OATF){
    return constRho * AtmoSigma_fOATFahrenheitHp($OATF, $HP);
}

function AtmoRho_SlugPerft3_fHpISAdevFahrenheit($HP, $ISAdevF){
    return constRho * AtmoSigma_fISAdevFahrenheitHp($ISAdevF, $HP);
}

function AtmoRho_SlugPerft3_fHpISAdevCelsius($HP, $ISAdevC){
    return constRho * AtmoSigma_fISAdevCelsiusHp($ISAdevC, $HP);
}

function AtmoConvKtoC($TKelvin){
    return $TKelvin - constTKZeroC;
}

function AtmoConvKtoR($TKelvin){
    return $TKelvin * K_TO_R;
}

function AtmoConvKtoF($TKelvin){
    return AtmoConvKtoR($TKelvin) - constTRZeroF;
}

function AtmoConvCtoK($TCelsius){
    return $TCelsius + constTKZeroC;
}

function AtmoConvCtoR($TCelsius){
    return AtmoConvKtoR(AtmoConvCtoK($TCelsius));
}

function AtmoConvCtoF($TCelsius){
    return AtmoConvCtoR($TCelsius) - constTRZeroF;
}

function AtmoConvRtoK($TRankine){
    return $TRankine / K_TO_R;
}

function AtmoConvRtoC($TRankine){
    return AtmoConvRtoK($TRankine) - constTKZeroC;
}

function AtmoConvRtoF($TRankine){
    return $TRankine - constTRZeroF;
}

function AtmoConvFtoK($TFahrenheit){
    return AtmoConvFtoR($TFahrenheit) / K_TO_R;
}

function AtmoConvFtoC($TFahrenheit){
    return ($TFahrenheit - 32) / K_TO_R;
}

function AtmoConvFtoR($TFahrenheit){
    return $TFahrenheit + constTRZeroF;
}

function AtmoConvKnotsToFPS($knots){
    return $knots / FPS_TO_KNOTS;
}

function AtmoConvKnotsToMeterPerSec($knots){
    return $knots / FPS_TO_KNOTS / FEET_TO_METERS;
}

function AtmoTheta_fOATKelvin($TKelvin){
    return $TKelvin / constTo;
}

function AtmoTheta_fOATCelsius($TCelsius){
    return AtmoTheta_fOATKelvin(AtmoConvCtoK($TCelsius));
}

function AtmoTheta_fOATRankine($TRankine){
    return AtmoTheta_fOATKelvin(AtmoConvRtoK($TRankine));
}

function AtmoTheta_fOATFahrenheit($TFahrenheit){
    return AtmoTheta_fOATKelvin(AtmoConvFtoK($TFahrenheit));
}

function AtmoISAdev_Celsius_fOATKelvinHp($TKelvin, $HP){
    return $TKelvin - AtmoTSTD_Kelvin_fHp($HP);
}

function AtmoISAdev_Celsius_fOATCelsiusHp($TCelsius, $HP){
    return $TCelsius - AtmoTSTD_Celsius_fHp($HP);
}

function AtmoISAdev_Celsius_fOATFahrenheitHp($TFahrenheit, $HP){
    return AtmoConvFtoK($TFahrenheit) - AtmoTSTD_Kelvin_fHp($HP);
}

function AtmoISAdev_Celsius_fOATRankineHp($TRankine, $HP){
    return AtmoConvRtoK($TRankine) - AtmoTSTD_Kelvin_fHp($HP);
}

function AtmoISAdev_Fahrenheit_fOATKelvinHp($TKelvin, $HP){
    return AtmoConvKtoR($TKelvin) - AtmoTSTD_Rankine_fHp($HP);
}

function AtmoISAdev_Fahrenheit_fOATCelsiusHp($TCelsius, $HP){
    return AtmoConvCtoR($TCelsius) - AtmoTSTD_Rankine_fHp($HP);
}

function AtmoISAdev_Fahrenheit_fOATFahrenheitHp($TFahrenheit, $HP){
    return $TFahrenheit - AtmoTSTD_Fahrenheit_fHp($HP);
}

function AtmoISAdev_Fahrenheit_fOATRankineHp($TRankine, $HP){
    return $TRankine - AtmoTSTD_Rankine_fHp($HP);
}

function AtmoOAT_Celsius_fISAdevCelsiusHp($ISAdevC, $HP){
    return AtmoTSTD_Celsius_fHp($HP) + $ISAdevC;
}

function AtmoOAT_Kelvin_fISAdevCelsiusHp($ISAdevC, $HP){
    return AtmoTSTD_Kelvin_fHp($HP) + $ISAdevC;
}

function AtmoOAT_Fahrenheit_fISAdevCelsiusHp($ISAdevC, $HP){
    return AtmoTSTD_Fahrenheit_fHp($HP) + $ISAdevC * K_TO_R;
}

function AtmoOAT_Rankine_fISAdevCelsiusHp($ISAdevC, $HP){
    return AtmoTSTD_Rankine_fHp($HP) + $ISAdevC * K_TO_R;
}

function AtmoSpdSnd_KTS_fISAdevCelsiusHp($ISAdevC, $HP){
    return AtmoSpdSnd_KTS_fOATKelvin(AtmoOAT_Kelvin_fISAdevCelsiusHp($ISAdevC, $HP));
}

function AtmoSpdSnd_MPH_fISAdevCelsiusHp($ISAdevC, $HP){
    return AtmoSpdSnd_MPH_fOATKelvin(AtmoOAT_Kelvin_fISAdevCelsiusHp($ISAdevC, $HP));
}

function AtmoSpdSnd_KPH_fISAdevCelsiusHp($ISAdevC, $HP){
    return AtmoSpdSnd_KPH_fOATKelvin(AtmoOAT_Kelvin_fISAdevCelsiusHp($ISAdevC, $HP));
}

function AtmoSpdSnd_FPS_fISAdevCelsiusHp($ISAdevC, $HP){
    return AtmoSpdSnd_FPS_fOATKelvin(AtmoOAT_Kelvin_fISAdevCelsiusHp($ISAdevC, $HP));
}

function AtmoSpdSnd_mps_fISAdevCelsiusHp($ISAdevC, $HP){
    return AtmoSpdSnd_mps_fOATKelvin(AtmoOAT_Kelvin_fISAdevCelsiusHp($ISAdevC, $HP));
}

function AtmoTheta_fISAdevCelsiusHp($ISAdevC, $HP){
    return AtmoOAT_Kelvin_fISAdevCelsiusHp($ISAdevC, $HP) / constTo;
}

function AtmoSigma_fISAdevCelsiusHp($ISAdevC, $HP){
    return AtmoDelta_fHp($HP) / AtmoTheta_fISAdevCelsiusHp($ISAdevC, $HP);
}

function AtmoISAdev_Fahrenheit_fISAdevCelsius($ISAdevC){
    return $ISAdevC * K_TO_R;
}

function AtmoOAT_Celsius_fISAdevFahrenheitHp($ISAdevF, $HP){
    return AtmoTSTD_Celsius_fHp($HP) + $ISAdevF / K_TO_R;
}

function AtmoOAT_Kelvin_fISAdevFahrenheitHp($ISAdevF, $HP){
    return AtmoTSTD_Kelvin_fHp($HP) + $ISAdevF / K_TO_R;
}

function AtmoOAT_Fahrenheit_fISAdevFahrenheitHp($ISAdevF, $HP){
    return AtmoTSTD_Fahrenheit_fHp($HP) + $ISAdevF;
}

function AtmoOAT_Rankine_fISAdevFahrenheitHp($ISAdevF, $HP){
    return AtmoTSTD_Rankine_fHp($HP) + $ISAdevF;
}

function AtmoSpdSnd_KTS_fISAdevFahrenheitHp($ISAdevF, $HP){
    return AtmoSpdSnd_KTS_fOATRankine(AtmoOAT_Rankine_fISAdevFahrenheitHp($ISAdevF, $HP));
}

function AtmoSpdSnd_MPH_fISAdevFahrenheitHp($ISAdevF, $HP){
    return AtmoSpdSnd_MPH_fOATRankine(AtmoOAT_Rankine_fISAdevFahrenheitHp($ISAdevF, $HP));
}

function AtmoSpdSnd_KPH_fISAdevFahrenheitHp($ISAdevF, $HP){
    return AtmoSpdSnd_KPH_fOATRankine(AtmoOAT_Rankine_fISAdevFahrenheitHp($ISAdevF, $HP));
}

function AtmoSpdSnd_FPS_fISAdevFahrenheitHp($ISAdevF, $HP){
    return AtmoSpdSnd_FPS_fOATRankine(AtmoOAT_Rankine_fISAdevFahrenheitHp($ISAdevF, $HP));
}

function AtmoSpdSnd_mps_fISAdevFahrenheitHp($ISAdevF, $HP){
    return AtmoSpdSnd_mps_fOATRankine(AtmoOAT_Rankine_fISAdevFahrenheitHp($ISAdevF, $HP));
}

function AtmoTheta_fISAdevFahrenheitHp($ISAdevF, $HP){
    return AtmoOAT_Rankine_fISAdevFahrenheitHp($ISAdevF, $HP) / constTo / K_TO_R;
}

function AtmoSigma_fISAdevFahrenheitHp($ISAdevF, $HP){
    return AtmoDelta_fHp($HP) / AtmoTheta_fISAdevFahrenheitHp($ISAdevF, $HP);
}

function AtmoISAdev_Celsius_fISAdevFahrenheitHp($ISAdevF){
    return $ISAdevF / K_TO_R;
}

function AtmoSigma_fOATCelsiusHp($TCelsius, $HP){
    return AtmoDelta_fHp($HP) / AtmoTheta_fOATCelsius($TCelsius);
}

function AtmoSigma_fOATKelvinHp($TKelvin, $HP){
    return AtmoDelta_fHp($HP) / AtmoTheta_fOATKelvin($TKelvin);
}

function AtmoSigma_fOATFahrenheitHp($TFahrenheit, $HP){
    return AtmoDelta_fHp($HP) / AtmoTheta_fOATFahrenheit($TFahrenheit);
}

function AtmoSigma_fOATRankineHp($TRankine, $HP){
    return AtmoDelta_fHp($HP) / AtmoTheta_fOATRankine($TRankine);
}

function AtmoMach_fHpKCAS($HP, $KCAS){
    $Delta = AtmoDelta_fHp($HP);
    $Mach = (2 / (constGammaAir - 1) * ((1 / $Delta * ((1 + (constGammaAir - 1) / 2 * ($KCAS / constao) ^ 2) 
        ^ (constGammaAir / (constGammaAir - 1)) - 1) + 1) ^ ((constGammaAir - 1) / constGammaAir) - 1)) ^ 0.5;
    if ($Mach > 1) {
        $PA = $Delta * constPo;
        $Qc = AtmoQc_PSF_fKCAS($KCAS);
        do{
            $MachLast = $Mach;
            $Mach = (2 / (constGammaAir + 1) * ($Qc / $PA + 1) ^ ((constGammaAir - 1) / constGammaAir) * 
            ((1 - constGammaAir + 2 * constGammaAir * $MachLast ^ 2) / (constGammaAir + 1)) ^ (1 / constGammaAir)) ^ 0.5;
        } while (abs($Mach - $MachLast) > constMachEpsilon);
    }
    return $Mach;
}

function AtmoMach_fHpQcPSF($HP, $Qc){
    $Delta = AtmoDelta_fHp($HP);
    $PA = $Delta * constPo;
    $Mach = (2 / (constGammaAir - 1) * (($Qc / $PA + 1) ^ ((constGammaAir - 1) / constGammaAir) - 1)) ^ 0.5;
    if ($Mach > 1) {
        do{
            $MachLast = $Mach;
            $Mach = (2 / (constGammaAir + 1) * ($Qc / $PA + 1) ^ ((constGammaAir - 1) / constGammaAir) * 
            ((1 - constGammaAir + 2 * constGammaAir * $MachLast ^ 2) / (constGammaAir + 1)) ^ (1 / constGammaAir)) ^ 0.5;
        }while (abs($Mach - MachLast) > constMachEpsilon);
    }
    return $Mach;
}

function AtmoMach_fHpKEAS($HP, $KEAS){
    return AtmoConvKnotsToFPS($KEAS) * (constRho / constGammaAir / AtmoPstatic_PSF_fHp($HP)) ^ 0.5;
}

function AtmoMach_fHpQPSF($HP, $Q){
    return (2 * $Q / (constGammaAir * constPo * AtmoDelta_fHp($HP))) ^ 0.5;
}

function AtmoMachSTD_fHpKTAS($HP, $KTAS){
    return $KTAS / AtmoSpdSndSTD_KTS_fHp($HP);
}

function AtmoKTASSTD_fHpKCAS($HP, $KCAS){
    return AtmoSpdSndSTD_KTS_fHp($HP) * AtmoMach_fHpKCAS($HP, $KCAS);
}

function AtmoKTASSTD_fHpKEAS($HP, $KEAS){
    return$KEAS / (AtmoSigmaSTD_fHp($HP)) ^ 0.5;
}

function AtmoKTASSTD_fHpMach($HP, $Mach){
    return AtmoSpdSndSTD_KTS_fHp($HP) * $Mach;
}

function AtmoKTASSTD_fHpQPSF($HP, $Q){
    return FPS_TO_KNOTS * (2 * $Q / (AtmoRhoSTD_SlugPerft3_fHp($HP))) ^ 0.5;
}

function AtmoKTAS_fHpQPSFOATCelsius($HP, $Q, $OATC){
    return AtmoMach_fHpQPSF($HP, $Q) * AtmoSpdSnd_KTS_fOATCelsius($OATC);
}

function AtmoKTAS_fHpQPSFOATKelvin($HP, $Q, $OATC){
    return AtmoMach_fHpQPSF($HP, $Q) * AtmoSpdSnd_KTS_fOATKelvin($OATC);
}

function AtmoKTAS_fHpQPSFOATFahrenheit($HP, $Q, $OATF){
    return AtmoMach_fHpQPSF($HP, $Q) * AtmoSpdSnd_KTS_fOATFahrenheit($OATF);
}

function AtmoKTAS_fHpQPSFOATRankine($HP, $Q, $OATR){
    return AtmoMach_fHpQPSF($HP, $Q) * AtmoSpdSnd_KTS_fOATRankine($OATR);
}

function AtmoKTAS_fHpQPSFISAdevCelsius($HP, $Q, $ISAdevC){
    return AtmoMach_fHpQPSF($HP, $Q) * AtmoSpdSnd_KTS_fISAdevCelsiusHp($ISAdevC, $HP);
}

function AtmoKTAS_fHpQPSFISAdevFahrenheit($HP, $Q, $ISAdevF){
    return AtmoMach_fHpQPSF($HP, $Q) * AtmoSpdSnd_KTS_fISAdevFahrenheitHp($ISAdevF, $HP);
}

function AtmoKTASSTD_fHpQcPSF($HP, $Qc){
    return AtmoMach_fHpQcPSF($HP, $Qc) * AtmoSpdSndSTD_KTS_fHp($HP);
}

function AtmoKTAS_fHpQcPSFOATCelsius($HP, $Qc, $OATC){
    return AtmoMach_fHpQcPSF($HP, $Qc) * AtmoSpdSnd_KTS_fOATCelsius($OATC);
}

function AtmoKTAS_fHpQcPSFOATFahrenheit($HP, $Qc, $OATF){
    return AtmoMach_fHpQcPSF($HP, $Qc) * AtmoSpdSnd_KTS_fOATFahrenheit($OATF);
}

function AtmoKTAS_fHpQcPSFOATKelvin($HP, $Qc, $OATC){
   return AtmoMach_fHpQcPSF($HP, $Qc) * AtmoSpdSnd_KTS_fOATKelvin($OATC);
}

function AtmoKTAS_fHpQcPSFOATRankine($HP, $Qc, $OATR){
    return AtmoMach_fHpQcPSF($HP, $Qc) * AtmoSpdSnd_KTS_fOATRankine($OATR);
}

function AtmoKTAS_fHpQcPSFISAdevCelsius($HP, $Qc, $ISAdevC){
    return AtmoMach_fHpQcPSF($HP, $Qc) * AtmoSpdSnd_KTS_fISAdevCelsiusHp($ISAdevC, $HP);
}

function AtmoKTAS_fHpQcPSFISAdevFahrenheit($HP, $Qc, $ISAdevF){
    return AtmoMach_fHpQcPSF($HP, $Qc) * AtmoSpdSnd_KTS_fISAdevFahrenheitHp($ISAdevF, $HP);
}

function AtmoKEAS_fHpKCAS($HP, $KCAS){
    $Mach = AtmoMach_fHpKCAS($HP, $KCAS);
    return AtmoKEAS_fHpMach($HP, $Mach);
}

function AtmoKEASSTD_fHpKTAS($HP, $KTAS){
    return $KTAS * (AtmoSigmaSTD_fHp($HP)) ^ 0.5;
}

function AtmoKEAS_fHpMach($HP, $Mach){
    return AtmoKTASSTD_fHpMach($HP, $Mach) * AtmoSigmaSTD_fHp($HP) ^ 0.5;
}

function AtmoKEAS_fQPSF($Q){
    return FPS_TO_KNOTS * (2 * $Q / constRho) ^ 0.5;
}

function AtmoKEAS_fHpQcPSF($HP, $Qc){
    $Mach = AtmoMach_fHpQcPSF($HP, $Qc);
    return AtmoKEAS_fHpMach($HP, $Mach);
}

function AtmoQc_PSF_fKCAS($KCAS){
    if ($KCAS < constao){
        return constPo * ((1 + (constGammaAir - 1) / 2 * ($KCAS / constao) ^ 2) ^ (constGammaAir / (constGammaAir - 1)) - 1);
    }else{
        return  constPo * (((constGammaAir + 1) / 2 * ($KCAS / constao) ^ 2) ^ (constGammaAir / (constGammaAir - 1)) * 
        ((constGammaAir + 1) / (1 - constGammaAir + 2 * constGammaAir * ($KCAS / constao) ^ 2)) ^ (1 / (constGammaAir - 1)) - 1);
    }
}

function AtmoQc_PSF_fHpMach($HP, $Mach){
    if ($Mach < 1){ 
    return AtmoPstatic_PSF_fHp($HP) * ((1 + (constGammaAir - 1) / 2 * $Mach ^ 2) ^ (constGammaAir / (constGammaAir - 1)) - 1);
    }else{
        return AtmoPstatic_PSF_fHp($HP) * (((constGammaAir + 1) / 2 * $Mach ^ 2) ^ (constGammaAir / (constGammaAir - 1)) * 
    ((constGammaAir + 1) / (1 - constGammaAir + 2 * constGammaAir * $Mach ^ 2)) ^ (1 / (constGammaAir - 1)) - 1);
        
    }
    
}

function AtmoQc_PSF_fHpKEAS($HP, $KEAS){
    $Mach = AtmoMach_fHpKEAS($HP, $KEAS);
    return AtmoQc_PSF_fHpMach($HP, $Mach);
}

function AtmoQcSTD_PSF_fHpKTAS($HP, $KTAS){
    $Mach = $KTAS / AtmoSpdSndSTD_KTS_fHp($HP);
    return AtmoQc_PSF_fHpMach($HP, $Mach);
}
    
function AtmoQc_PSF_fHpQPSF($HP, $Q){
    $Mach = AtmoMach_fHpQPSF($HP, $Q);
    return AtmoQc_PSF_fHpMach($HP, $Mach);
}

function AtmoQ_PSF_fHpKCAS($HP, $KCAS){
    $Mach = AtmoMach_fHpKCAS($HP, $KCAS);
    return AtmoQ_PSF_fHpMach($HP, $Mach);
}


function AtmoQ_PSF_fKEAS($KEAS){
    return 0.5 * constRho * AtmoConvKnotsToFPS($KEAS) ^ 2;
}

function AtmoQSTD_PSF_fHpKTAS($HP, $KTAS){
    $Mach = $KTAS / AtmoSpdSndSTD_KTS_fHp($HP);
    return AtmoQ_PSF_fHpMach($HP, $Mach);
}

function AtmoQ_PSF_fHpMach($HP, $Mach){
    return constGammaAir / 2 * AtmoDelta_fHp($HP) * constPo * $Mach ^ 2;
}

function AtmoQ_PSF_fHpQcPSF($HP, $Qc){
    $Mach = AtmoMach_fHpQcPSF($HP, $Qc);
    return AtmoQ_PSF_fHpMach($HP, $Mach);
}

function AtmoSubsonicEASoverCAS_fHpQc($HP, $Qc){
    $PA = AtmoPstatic_PSF_fHp($HP);
    // Ref Herrington, Ch. 1, eqn 2.18:
    return (((($Qc / $PA + 1) ^ ((constGammaAir - 1) / constGammaAir) - 1) / 
    (($Qc / constPo + 1) ^ ((constGammaAir - 1) / constGammaAir) - 1)) * $PA / constPo) ^ 0.5;
}

function AtmoCompCorrnKCASminusKEAS_fHpKEAS($HP, $KEAS){
    return AtmoKCAS_fHpKEAS($HP, $KEAS) - $KEAS;
}

function AtmoCompCorrnKCASminusKEAS_fHpKCAS($HP, $KCAS){
    return $KCAS - AtmoKEAS_fHpKCAS($HP, $KCAS);
}

function AtmoKCAS_fHpKEAS($HP, $KEAS){
    $KTAS = AtmoKTASSTD_fHpKEAS($HP, $KEAS);
    return AtmoKCASSTD_fHpKTAS($HP, $KTAS);
}

function AtmoKCASSTD_fHpKTAS($HP, $KTAS){
    $Mach = AtmoMachSTD_fHpKTAS($HP, $KTAS);
    return AtmoKCAS_fHpMach($HP, $Mach);
}

function AtmoKCAS_fHpMach($HP, $Mach){
    $Delta = AtmoDelta_fHp($HP);
    if ($Mach < 1) {
        $KCAS = constao * (2 / (constGammaAir - 1) * (($Delta * ((1 + (constGammaAir - 1) / 2 * $Mach ^ 2) 
        ^ (constGammaAir / (constGammaAir - 1)) - 1) + 1) ^ ((constGammaAir - 1) / constGammaAir) - 1)) ^ 0.5;
    }else{
        $KCAS = constao;
        $Qc = AtmoQc_PSF_fHpMach($HP, $Mach);
        do {
            $KCASLast = $KCAS;
            $KCAS = constao * (2 / (constGammaAir + 1) * ($Qc / constPo + 1) ^ ((constGammaAir - 1) / constGammaAir) * 
            ((1 - constGammaAir + 2 * constGammaAir * (KCASLast / constao) ^ 2) / (constGammaAir + 1)) ^ (1 / constGammaAir)) ^ 0.5;
        } while (abs($KCAS - $KCASLast) > constKCASEpsilon);
    }
    return $KCAS;
}

function AtmoKCAS_fHpQPSF($HP, $Q){
    $Mach = AtmoMach_fHpQPSF($HP, $Q);
    return AtmoKCAS_fHpMach($HP, $Mach);
}

function AtmoKCAS_fHpQcPSF($HP, $Qc){
    $Mach = AtmoMach_fHpQcPSF($HP, $Qc);
    return AtmoKCAS_fHpMach($HP, $Mach);
}
//replaced
//function AtmoRePerFtSTD_fHpMach($HP, $Mach){
//    $OATR = AtmoTSTD_Rankine_fHp($HP);
//    $PA = AtmoPstatic_PSF_fHp($HP);
//    return AtmoRePerFt_fPaPSFMachOATRankine($PA, $Mach, $OATR);
//}
//-replace
//function AtmoRePerFt_fHpMachOATCelsius($HP, $Mach, $OATC){
//    $OATR = AtmoConvCtoR($OATC);
//    $PA = AtmoPstatic_PSF_fHp($HP);
//    return AtmoRePerFt_fPaPSFMachOATRankine($PA, $Mach, $OATR);
//}
//-replace
//function AtmoRePerFt_fHpMachOATKelvin($HP, $Mach, $OATC){
//    $PA = AtmoPstatic_PSF_fHp($HP);
//    return AtmoRePerFt_fPaPSFMachOATKelvin($PA, $Mach, $OATC);
//}
//-replace
//function AtmoRePerFt_fHpMachOATFahrenheit($HP, $Mach, $OATF){
//    $OATR = AtmoConvFtoR($OATF);
//    $PA = AtmoPstatic_PSF_fHp($HP);
//    return AtmoRePerFt_fPaPSFMachOATRankine($PA, $Mach, $OATR);
//}
//-replace
//function AtmoRePerFt_fHpMachOATRankine($HP, $Mach, $OATR){
//    $PA = AtmoPstatic_PSF_fHp($HP);
//    return AtmoRePerFt_fPaPSFMachOATRankine($PA, $Mach, $OATR);
//}
function AtmoRePerFtSTD_fHpMach($Hp, $Mach){
    if($Mach <0){
      throw new Exception("Mach Number Can't be Negative!");   
    }
    $v = $Mach * AtmoSpdSndSTD_FPS_fHp($Hp);
    $KinVisc = AtmoViscKin_ft2PerSec_fSigmaTheta(AtmoSigmaSTD_fHp($Hp), AtmoThetaSTD_fHp($Hp));
    return   $v / $KinVisc;
 }
function AtmoRePerFt_fHpMachOATCelsius($Hp, $Mach, $OATC){
    $v = $Mach * AtmoSpdSnd_FPS_fOATCelsius($OATC);
    $KinVisc = AtmoViscKin_ft2PerSec_fSigmaTheta(AtmoSigma_fOATCelsiusHp($OATC, $Hp), AtmoTheta_fOATCelsius($OATC));
    return   $v / $KinVisc; 
}
function AtmoRePerFt_fHpMachOATKelvin($Hp, $Mach, $OATK){
    $v = $Mach * AtmoSpdSnd_FPS_fOATKelvin($OATK);
    $KinVisc = AtmoViscKin_ft2PerSec_fSigmaTheta(AtmoSigma_fOATKelvinHp($OATK, $Hp), AtmoTheta_fOATKelvin($OATK));
    return  $v / $KinVisc;


}

function AtmoRePerFt_fHpMachOATFahrenheit($Hp, $Mach, $OATF){
    $v = $Mach * AtmoSpdSnd_FPS_fOATFahrenheit($OATF);
    $KinVisc = AtmoViscKin_ft2PerSec_fSigmaTheta(AtmoSigma_fOATFahrenheitHp($OATF, $Hp), AtmoTheta_fOATFahrenheit($OATF));
    return $v / $KinVisc;
}

function AtmoRePerFt_fHpMachOATRankine($Hp, $Mach, $OATR){
    $v = $Mach * AtmoSpdSnd_FPS_fOATRankine($OATR);
    $KinVisc = AtmoViscKin_ft2PerSec_fSigmaTheta(AtmoSigma_fOATRankineHp($OATR, $Hp), AtmoTheta_fOATRankine($OATR));
    return  $v / $KinVisc; 
}

function AtmoRePerFt_fPaPSFMachOATRankine($PA, $Mach, $OATR){
    return ($Mach * $PA * constGammaAir ^ 0.5) / _
        ((1545.34896 * $OATR) ^ 0.5 * (0.0000000227 * $OATR ^ 1.5) / ($OATR + 198.6)); 
        //Ideal gas const 1,545.34896 ft lbf R-1 lb-mol-1?, R gas constant for air 1716.483 ft2/s2/R;
}
//-replace
//function AtmoRePerFt_fHpMachISAdevCelsius($HP, $Mach, $ISAdevC){
//    $OATC = AtmoTSTD_Celsius_fHp($HP) + $ISAdevC;
//    return AtmoRePerFt_fHpMachOATCelsius($HP, $Mach, $OATC);
//}
function AtmoRePerFt_fHpMachISAdevCelsius($Hp, $Mach, $ISAdevC){
    $v = $Mach * AtmoSpdSnd_FPS_fISAdevCelsiusHp($ISAdevC, $Hp);
    $KinVisc = AtmoViscKin_ft2PerSec_fSigmaTheta(AtmoSigma_fISAdevCelsiusHp($ISAdevC, $Hp), AtmoTheta_fISAdevCelsiusHp($ISAdevC, $Hp));

    return  $v / $KinVisc;
 }

//-- replaced
//function AtmoRePerFt_fHpMachISAdevFahrenheit($HP, $Mach, $ISAdevF){
//    $OATR = AtmoTSTD_Rankine_fHp($HP) + $ISAdevF;
//    return AtmoRePerFt_fHpMachOATRankine($HP, $Mach, $OATR);
//}
function AtmoRePerFt_fHpMachISAdevFahrenheit($Hp, $Mach, $ISAdevF){
    $v = $Mach * AtmoSpdSnd_FPS_fISAdevFahrenheitHp($ISAdevF, $Hp);
    $KinVisc = AtmoViscKin_ft2PerSec_fSigmaTheta(AtmoSigma_fISAdevFahrenheitHp($ISAdevF, $Hp), AtmoTheta_fISAdevFahrenheitHp($ISAdevF, $Hp));

    return  $v / $KinVisc; 
}

function AtmoRePerFt_fPaPSFMachOATKelvin($PA, $Mach, $OATC){
    $OATR = AtmoConvKtoR($OATC);
    return AtmoRePerFt_fPaPSFMachOATRankine($PA, $Mach, $OATR);
}

function AtmoKTAS_fHpKCASOATCelsius($HP, $KCAS, $OATC){
    $Mach = AtmoMach_fHpKCAS($HP, $KCAS);
    return AtmoKTAS_fMachOATCelsius($Mach, $OATC);
}

function AtmoKTAS_fHpKCASOATKelvin($HP, $KCAS, $OATC){
    $Mach = AtmoMach_fHpKCAS($HP, $KCAS);
    return AtmoKTAS_fMachOATKelvin($Mach, $OATC);
}

function AtmoKTAS_fHpKCASOATFahrenheit($HP, $KCAS, $OATF){
    $Mach = AtmoMach_fHpKCAS($HP, $KCAS);
    return AtmoKTAS_fMachOATFahrenheit($Mach, $OATF);
}

function AtmoKTAS_fHpKCASISAdevCelsius($HP, $KCAS, $ISAdevC){
    $Mach = AtmoMach_fHpKCAS($HP, $KCAS);
    $OATK = AtmoTSTD_Kelvin_fHp($HP) + $ISAdevC;
    return AtmoKTAS_fMachOATKelvin($Mach, $OATK);
}

function AtmoKTAS_fHpKCASISAdevFahrenheit($HP, $KCAS, $ISAdevF){
    $Mach = AtmoMach_fHpKCAS($HP, $KCAS);
    $OATR = AtmoTSTD_Rankine_fHp($HP) + $ISAdevF;
    return AtmoKTAS_fMachOATRankine($Mach, $OATR);
}

function AtmoKTAS_fHpKCASOATRankine($HP, $KCAS, $OATR){
    $Mach = AtmoMach_fHpKCAS($HP, $KCAS);
    return AtmoKTAS_fMachOATRankine($Mach, $OATR);
}

function AtmoKTAS_fHpKEASOATCelsius($HP, $KEAS, $OATC){
    $Mach = AtmoMach_fHpKEAS($HP,$KEAS);
    return AtmoKTAS_fMachOATCelsius($Mach, $OATC);
}

function AtmoKTAS_fHpKEASOATKelvin($HP, $KEAS, $OATK){
    $Mach = AtmoMach_fHpKEAS($HP, $KEAS);
    return AtmoKTAS_fMachOATKelvin($Mach, $OATK);
}

function AtmoKTAS_fHpKEASOATFahrenheit($HP, $KEAS, $OATF){
    $Mach = AtmoMach_fHpKEAS($HP, $KEAS);
    return AtmoKTAS_fMachOATFahrenheit($Mach, $OATF);
}

function AtmoKTAS_fHpKEASISAdevCelsius($HP, $KEAS, $ISAdevC){
    $Mach = AtmoMach_fHpKEAS($HP, $KEAS);
    $OATK = AtmoTSTD_Kelvin_fHp($HP) + $ISAdevC;
    return AtmoKTAS_fMachOATKelvin($Mach, $OATK);
}

function AtmoKTAS_fHpKEASISAdevFahrenheit($HP, $KEAS, $ISAdevF){
    $Mach = AtmoMach_fHpKEAS($HP, $KEAS);
    $OATR = AtmoTSTD_Rankine_fHp($HP) + $ISAdevF;
    return AtmoKTAS_fMachOATRankine($Mach,$OATR);
}

function AtmoKTAS_fHpKEASOATRankine($HP,$KEAS, $OATR){
    $Mach = AtmoMach_fHpKEAS($HP,$KEAS);
    return AtmoKTAS_fMachOATRankine($Mach, $OATR);
}

function AtmoKTAS_fMachOATCelsius($Mach, $OATC){
    return$Mach * AtmoSpdSnd_KTS_fOATCelsius($OATC);
}

function AtmoKTAS_fMachOATKelvin($Mach, $OATK){
    return$Mach * AtmoSpdSnd_KTS_fOATKelvin($OATK);
}

function AtmoKTAS_fMachOATFahrenheit($Mach, $OATF){
    return$Mach * AtmoSpdSnd_KTS_fOATFahrenheit($OATF);
}

function AtmoKTAS_fMachOATRankine($Mach, $OATR){
    return$Mach * AtmoSpdSnd_KTS_fOATRankine($OATR);
}

function AtmoKTAS_fMachHpISAdevCelsius($Mach, $HP, $ISAdevC){
    return $Mach * AtmoSpdSnd_KTS_fOATKelvin(AtmoTSTD_Kelvin_fHp($HP) + $ISAdevC);
}

function AtmoKTAS_fMachHpISAdevFahrenheit($Mach, $HP, $ISAdevF){
    return$Mach * AtmoSpdSnd_KTS_fOATRankine(AtmoTSTD_Rankine_fHp($HP) + $ISAdevF);
}

function AtmoMach_fKTASOATCelsius($KTAS, $OATC){
    return $KTAS / AtmoSpdSnd_KTS_fOATCelsius($OATC);
}

function AtmoMach_fKTASOATKelvin($KTAS, $OATK){
    return $KTAS / AtmoSpdSnd_KTS_fOATKelvin($OATK);
}

function AtmoMach_fKTASOATRankine($KTAS, $OATR){
    return $KTAS / AtmoSpdSnd_KTS_fOATRankine($OATR);
}

function AtmoMach_fKTASOATFahrenheit($KTAS, $OATF){
    return $KTAS / AtmoSpdSnd_KTS_fOATFahrenheit($OATF);
}

function AtmoMach_fHpKTASISAdevCelsius($HP, $KTAS, $ISAdevC){
    $Ta = AtmoTSTD_Celsius_fHp($HP) + $ISAdevC;
    return $KTAS / AtmoSpdSnd_KTS_fOATCelsius($Ta);
}

function AtmoMach_fHpKTASISAdevFahrenheit($HP, $KTAS, $ISAdevF){
    $Ta = AtmoTSTD_Fahrenheit_fHp($HP) + $ISAdevF;
    return $KTAS / AtmoSpdSnd_KTS_fOATFahrenheit($Ta);
}

function AtmoKEAS_fHpKTASOATCelsius($HP, $KTAS, $OATC){
    $Mach = AtmoMach_fKTASOATCelsius($KTAS, $OATC);
    return AtmoKEAS_fHpMach($HP, $Mach);
}

function AtmoKEAS_fHpKTASOATKelvin($HP, $KTAS, $OATK){
    $Mach = AtmoMach_fKTASOATKelvin($KTAS, $OATK);
    return AtmoKEAS_fHpMach($HP, $Mach);
}

function AtmoKEAS_fHpKTASOATRankine($HP, $KTAS, $OATR){
    $Mach = AtmoMach_fKTASOATRankine($KTAS, $OATR);
    return AtmoKEAS_fHpMach($HP, $Mach);
}

function AtmoKEAS_fHpKTASOATFahrenheit($HP, $KTAS, $OATF){
    $Mach = AtmoMach_fKTASOATFahrenheit($KTAS, $OATF);
    return AtmoKEAS_fHpMach($HP, $Mach);
}

function AtmoKEAS_fHpKTASISAdevCelsius($HP, $KTAS, $ISAdevC){
    $Mach = AtmoMach_fHpKTASISAdevCelsius($HP, $KTAS, $ISAdevC);
    return AtmoKEAS_fHpMach($HP, $Mach);
}

function AtmoKEAS_fHpKTASISAdevFahrenheit($HP, $KTAS, $ISAdevF){
    $Mach = AtmoMach_fHpKTASISAdevFahrenheit($HP, $KTAS, $ISAdevF);
    return AtmoKEAS_fHpMach($HP, $Mach);
}

function AtmoKCAS_fHpKTASOATCelsius($HP, $KTAS, $OATC){
    $Mach = AtmoMach_fKTASOATCelsius($KTAS, $OATC);
    return AtmoKCAS_fHpMach($HP, $Mach);
}

function AtmoKCAS_fHpKTASOATKelvin($HP, $KTAS, $OATK){
    $Mach = AtmoMach_fKTASOATKelvin($KTAS, $OATK);
    return AtmoKCAS_fHpMach($HP, $Mach);
}

function AtmoKCAS_fHpKTASOATRankine($Hp, $KTAS, $OATR){
    $Mach = AtmoMach_fKTASOATRankine($KTAS, $OATR);
    return AtmoKCAS_fHpMach($Hp, $Mach);
}

function AtmoKCAS_fHpKTASOATFahrenheit($Hp, $KTAS, $OATF){
    $Mach = AtmoMach_fKTASOATFahrenheit($KTAS, $OATF);
    return AtmoKCAS_fHpMach($Hp, $Mach);
}

function AtmoKCAS_fHpKTASISAdevCelsius($Hp, $KTAS, $ISAdevC){
    $Mach = AtmoMach_fHpKTASISAdevCelsius($Hp, $KTAS, $ISAdevC);
    return AtmoKCAS_fHpMach($Hp, $Mach);
}

function AtmoKCAS_fHpKTASISAdevFahrenheit($Hp, $KTAS, $ISAdevF){
    $Mach = AtmoMach_fHpKTASISAdevFahrenheit($Hp, $KTAS, $ISAdevF);
    return AtmoKCAS_fHpMach($Hp, $Mach);
}

function AtmoQ_PSF_fHpKTASOATCelsius($Hp, $KTAS, $OATC){
    $Mach = AtmoMach_fKTASOATCelsius($KTAS, $OATC);
    return AtmoQ_PSF_fHpMach($Hp, $Mach);
}

function AtmoQ_PSF_fHpKTASOATKelvin($Hp, $KTAS, $OATK){
    $Mach = AtmoMach_fKTASOATKelvin($KTAS, $OATK);
    return AtmoQ_PSF_fHpMach($Hp, $Mach);
}

function AtmoQ_PSF_fHpKTASOATRankine($Hp, $KTAS, $OATR){
    $Mach = AtmoMach_fKTASOATRankine($KTAS, $OATR);
    return AtmoQ_PSF_fHpMach($Hp, $Mach);
}

function AtmoQ_PSF_fHpKTASOATFahrenheit($Hp, $KTAS, $OATF){
    $Mach = AtmoMach_fKTASOATFahrenheit($KTAS, $OATF);
    return AtmoQ_PSF_fHpMach($Hp, $Mach);
}

function AtmoQ_PSF_fHpKTASISAdevCelsius($Hp, $KTAS, $ISAdevC){
    $Mach = AtmoMach_fHpKTASISAdevCelsius($Hp, $KTAS, $ISAdevC);
    return AtmoQ_PSF_fHpMach($Hp, $Mach);
}

function AtmoQ_PSF_fHpKTASISAdevFahrenheit($Hp, $KTAS, $ISAdevF){
    $Mach = AtmoMach_fHpKTASISAdevFahrenheit($Hp, $KTAS, $ISAdevF);
    return AtmoQ_PSF_fHpMach($Hp, $Mach);
}

function AtmoQc_PSF_fHpKTASOATCelsius($Hp, $KTAS, $OATC){
    $Mach = AtmoMach_fKTASOATCelsius($KTAS, $OATC);
    return AtmoQc_PSF_fHpMach($Hp, $Mach);
}

function AtmoQc_PSF_fHpKTASOATKelvin($Hp, $KTAS, $OATK){
    $Mach = AtmoMach_fKTASOATKelvin($KTAS, $OATK);
    return AtmoQc_PSF_fHpMach($Hp, $Mach);
}

function AtmoQc_PSF_fHpKTASOATRankine($Hp, $KTAS, $OATR){
    $Mach = AtmoMach_fKTASOATRankine($KTAS, $OATR);
    return AtmoQc_PSF_fHpMach($Hp, $Mach);
}

function AtmoQc_PSF_fHpKTASOATFahrenheit($Hp, $KTAS, $OATF){
    $Mach = AtmoMach_fKTASOATFahrenheit($KTAS, $OATF);
    return AtmoQc_PSF_fHpMach($Hp, $Mach);
}

function AtmoQc_PSF_fHpKTASISAdevCelsius($Hp, $KTAS, $ISAdevC){
    $Mach = AtmoMach_fHpKTASISAdevCelsius($Hp, $KTAS, $ISAdevC);
    return  AtmoQc_PSF_fHpMach($Hp, $Mach);
}

function AtmoQc_PSF_fHpKTASISAdevFahrenheit($Hp, $KTAS, $ISAdevF){
    $Mach = AtmoMach_fHpKTASISAdevFahrenheit($Hp, $KTAS, $ISAdevF);
    return AtmoQc_PSF_fHpMach($Hp, $Mach);
}
// Added new funciton
function AtmoConvSlugPerFt3ToKgPerM3($density){
    return   SLUGPERFT3_TO_KGPERM3 * $density; 
}

function AtmoConvKgPerM3ToSlugPerFt3($density){
    return   $density / SLUGPERFT3_TO_KGPERM3; 
}

function AtmoViscDyn_kgPerMSec_fTheta($Theta){
  $t = $Theta * constTo;
  return   constBETAVISC * ($t * $t * $t) ^ 0.5 / ($t + constSUTH); // Dynamic viscosity, mu, in kg/(m-sec) 
}

function AtmoViscDyn_SlugPerftSec_fTheta($Theta){
  return   AtmoViscDyn_kgPerMSec_fTheta($Theta) / PSF_TO_NSM; 
}

function AtmoViscKin_M2PerSec_fSigmaTheta($sigma, $Theta){
  return   AtmoViscDyn_kgPerMSec_fTheta($Theta) / ($sigma * constRho * SLUGPERFT3_TO_KGPERM3); 
}

function AtmoViscKin_ft2PerSec_fSigmaTheta($sigma, $Theta){
  return   AtmoViscDyn_SlugPerftSec_fTheta($Theta) / ($sigma * constRho); 
  ?>
}
