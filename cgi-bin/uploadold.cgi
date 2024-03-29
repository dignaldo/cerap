#!/usr/bin/perl -w

$content_type = $ENV{'CONTENT_TYPE'};
$len = $ENV{'CONTENT_LENGTH'};
$bRead = 0;

use CGI;
use Fcntl qw(:DEFAULT :flock);
use File::Temp qw/ tempfile tempdir /;
#use Carp;

$starttime = time;

@qstring=split(/&/,$ENV{'QUERY_STRING'});
$sessionid = $qstring[0];
$uploadsFolder = $qstring[1];

print "Content-Type: text/plain\n\n";

if($sessionid eq 'test'){
	print "ok";
	exit;
}
if ($uploadsFolder eq "") { exit; }
if (index($uploadsFolder,"..") >= 0) { exit; }
if (index($uploadsFolder,"/wstemp/") < 0) { exit; }

$tmpfile   = "$uploadsFolder\\temp_$sessionid";
$statsfile = "$uploadsFolder\\stats_$sessionid.txt";
$tmpfilepre= "$uploadsFolder\\";
sleep(2);

$tmpfile =~s/\\/\//g;
$statsfile =~s/\\/\//g;
$tmpfilepre =~s/\\/\//g;

open(TMP,"+>","$tmpfile") or &bye_bye ("can't open temp file");
open(STATS,">","$statsfile") or print "can't open temp file";

$rLen = 4096;
if($len - $bRead < $rLen){
	$rLen = $len-$bRead;
}

while ($bRead < $len && read (STDIN ,$LINE, $rLen))
{

	$bRead += length $LINE;
	if($len - $bRead < $rLen){
		$rLen = $len-$bRead;
	}
	
	print TMP $LINE;
	
	$now = time;
	$elapsed = $now-$starttime;
	$percent = ($bRead/$len) * 100;

	if($elapsed >= 1){
		$estimate = $bRead / $elapsed; # in kb
	}else{
		$estimate = $bRead / .5;
	}

	$estTime = ($len-$bRead)/$estimate; #in sec
	$percentEst = $estimate * 100; #in percent

	# % , % per second, kb estimate, est time remaining
	if($percent >= 99){
		$percent = 99;
	}

	seek(STATS,0,SEEK_SET);
	print STATS "$percent|$bRead|$len|$estimate";
	
}


if($bRead != $len){
	close(TMP);

	$bash = `del "$tmpfile"`;
	$bash = `del "$statsfile"`;

	exit;
}

$bound = $content_type;
$bound =~s/.*boundary=//g;

seek(TMP,0,SEEK_SET);

my $output = join ("", <TMP>);

@files = split(/--$bound/,$output);
$i = 0;
foreach $file(@files){
	($headers,$filedata) = split(/\n\r\n/,$file,2);
	$filename = $headers;
	
	$filename =~s/.*?\n?.+?filename=\"(.+(\\|\/))?(.+?)\".*\n.*/file-$3/g;
	if(substr($filename,0,5) eq "file-"){
		$filename =~s/file-//;
		chomp($filedata);
		chop($filedata);

		open(FILE,">","$tmpfilepre$filename") or print "can't open temp file";
		binmode(FILE);
		print FILE $filedata;
		close FILE;


	}
$i++;
}

seek(STATS,0,SEEK_SET);
print STATS "100|$bRead|$len|$estimate";
close(STATS);

close TMP;
