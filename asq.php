<?php

@system("clear");

function banner(){
    $blue="\033[1;34m";
    $cyan="\033[1;36m";
    $okegreen="\033[92m";
    $lightgreen="\033[1;32m";
    $white="\033[1;37m";
    $purple="\033[1;35m";
    $red="\033[1;31m";
    $yellow="\033[1;33m";
    print "\n";
    print "$yellow  ╔═╗╔═╗╔═╗  $white Ask\n";
    print "$yellow  ╠═╣╚═╗║═╬╗ $white Some\n";
    print "$yellow  ╩ ╩╚═╝╚═╝╚ $white Questions\n";
    print "\n";
}

banner();

function tanya(){
    $blue="\033[1;34m";
    $cyan="\033[1;36m";
    $okegreen="\033[92m";
    $lightgreen="\033[1;32m";
    $white="\033[1;37m";
    $purple="\033[1;35m";
    $red="\033[1;31m";
    $yellow="\033[1;33m";
    print "$okegreen ??$white Mau bertanya tentang apa? : ";
    $tanya = trim(fgets(STDIN));
    print "$red //$white Tunggu selagi saya mencari pertanyaan ...\n";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL,'http://nuaing.web.id/nanya/index.php?type=quora&q='.$tanya);
    $result=curl_exec($ch);
    $json = json_decode($result, true);
    print "$red //$white Dibawah ini adalah pertanyaan yang dapat anda berikan :\n\n";
    foreach ($json as $row){
        $soal = $row['title'];
        $link = $row['url'];
        print "$yellow    ->$white $soal\n";
    }
    print "\n";
    print "$okegreen ??$white Mau bertanya lagi? (Y/n) : ";
    $ulang = trim(fgets(STDIN));
    if ( $ulang == 'Y' OR $ulang == 'y' ){
        tanya();
    }
    elseif ( $ulang == 'N' or $ulang == 'n' ){
        print "$red !!$white Keluar\n\n";
        exit();
    }
    else{
        print "$red !!$white Aborting\n\n";
        exit();
    }
}

tanya();
