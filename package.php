<?php
require_once 'PEAR/PackageFileManager2.php';
// recommended - makes PEAR_Errors act like exceptions (kind of)
PEAR::setErrorHandling(PEAR_ERROR_DIE);

$packagexml = new PEAR_PackageFileManager2();
$packagexml->setOptions(array('filelistgenerator' => 'file',
      'packagedirectory' => dirname(__FILE__),
      'baseinstalldir' => 'Feed',
      'simpleoutput' => true));
$packagexml->setPackageType('php');
$packagexml->addRelease();
$packagexml->setPackage('Feed_OData');
$packagexml->setChannel('pear.php.net');
$packagexml->setReleaseVersion('0.1.0');
$packagexml->setAPIVersion('0.1.0');
$packagexml->setReleaseStability('alpha');
$packagexml->setAPIStability('alpha');
$packagexml->setSummary('A package that allows developers to create OData feeds.');

$packagexml->setDescription(
    'This package allows any one developer to create valid '. 
    'OData AtomPub and JSON feeds'
);

$packagexml->setNotes('Initial release');
$packagexml->setPhpDep('5.2.10');
$packagexml->setPearinstallerDep('1.4.0a12');
$packagexml->addMaintainer('lead', 'davidc', 'David Coallier', 'davidc@php.net');
$packagexml->setLicense('BSD License', 'http://www.opensource.org/licenses/bsd-license.html');
$packagexml->addGlobalReplacement('package-info', '@PEAR-VER@', 'version');
$packagexml->generateContents();

$packagexml->writePackageFile();
exit(0);
if (isset($_GET['make']) || (isset($_SERVER['argv']) && @$_SERVER['argv'][1] == 'make')) {
    $packagexml->writePackageFile();
} else {
    $pkg->debugPackageFile();
    $packagexml->debugPackageFile();
}
?>
