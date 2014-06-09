#!/usr/bin/perl -w -I.

use CGI;
use Fcntl qw(:DEFAULT :flock);
use File::Temp qw/ tempfile tempdir /;

$starttime = time;
$len = $ENV{'CONTENT_LENGTH'};
$bRead = 0;

@qstring=split(/&/,$ENV{'QUERY_STRING'});
$sessionid = $qstring[0];
$uploadsFolder = $qstring[1];

print "Content-Type: text/plain\n\n";
if($sessionid eq 'test'){
print "ok";
exit;
}

if($sessionid eq 'check'){
print "Using CGI version $CGI::VERSION";
exit;
}

if ($uploadsFolder eq "") { exit; }
if (index($uploadsFolder,"..") >= 0) { exit; }
if (index($uploadsFolder,"/wstemp/") < 0) { exit; }

$statsfile = "$uploadsFolder\\stats_$sessionid.txt";
$tmpfilepre= "$uploadsFolder\\";
sleep(2);

$statsfile =~s/\\/\//g;
$tmpfilepre =~s/\\/\//g;

open(STATS,">","$statsfile") or print "can't open temp file";

$q = CGI->new(\&hook, 0, 0);
$last_filename = "";
local *UPLOADFILE;

sub hook
{
my ($filename, $buffer, $bytes_read, $data) = @_;

if ($last_filename ne $filename) {
if ($last_filename ne '') {
close UPLOADFILE;
}

$last_filename = $filename;
$filename =~ s/.*[\/\\](.*)/$1/;
open UPLOADFILE, ">$tmpfilepre$filename";
binmode UPLOADFILE;

}

print UPLOADFILE $buffer;

{
$bRead += length($buffer);

$now = time;
$elapsed = $now-$starttime;
$percent = ($bRead/$len) * 100;

if($elapsed >= 1){
$estimate = $bRead / $elapsed; # in kb
}else{
$estimate = $bRead / .5;
}

# % , % per second, kb estimate, est time remaining
if($percent >= 99){
$percent = 99;
}

seek(STATS,0,SEEK_SET);
print STATS "$percent|$bRead|$len|$estimate";
}
}


if ($last_filename ne '') {
close UPLOADFILE;
}

seek(STATS,0,SEEK_SET);
print STATS "100|$bRead|$len|$estimate";
close(STATS); 