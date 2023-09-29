<?	
// ini_set('display_errors',1);
// error_reporting(E_ALL);	
if(!isset($_SESSION))
	session_start();
if($_SESSION['user_name']=="")
	{	
		echo "<html><body><h3>You are not logged in the system. Please ";
		echo "<h2><a href='index.php?NotLoggedin=true'>Click here to login</a></h2>";
		echo "</h3></body></html>";
		exit;
	}
require_once("../../Lib/PHPClasses/Functions.php");
require_once("../../Lib/PHPClasses/configuration.php");
require_once("../../Lib/PHPClasses/database.php");
require_once ("../../Lib/PHPClasses/setConfigParameters.php");

if(!isset($db))
	$db=new database();

$reportName=getParameters('reportName');

$selectDatabase=array($ShipmentSummaryModuleName,$IssueSummaryModuleName,'INVOICESUMMARY',$OpenInvoiceSummaryModuleName,$InvoiceDeliverySummaryModuleName,$InterCompanySummary);

//echo "RN: ".$reportName;

if(in_array($reportName,$selectDatabase))
{
    
	$db=new database('SUMMARY');
	//echo 'summary Db';
}
else
{
    //echo 'Detail Db';
  
}

$totalRecords=$db->totalRecords();
//echo "TotRec: ".$totalRecords;

setParameters($reportName.'totalRecords',$totalRecords);
$reportquery=generateQuery("main");

if ($_SESSION['userid']==1181)
{
echo "query: ".$reportquery;
}
?>
<?

$TableName=$TableName[$reportName];
/*if(hasReportAccess($showDisputedModule,1))
{	
	//include "Lib/PHPClasses/showDisputed.php";
	include "../../Lib/PHPClasses/disputeSummary.php";	
}*/
if(hasReportAccess($DisputeModule,1))
{	
	require_once "../../Lib/PHPClasses/DisputeInvoices.php";	
}
if(hasReportAccess($DisputeSummaryModule,1))
{	
	require_once "../../Lib/PHPClasses/DisputeInvoicesSummary.php";	
}

if(hasReportAccess($DisputeExportModule,1))
{	
	require_once "../../Lib/PHPClasses/ExportDispute.php";	
}
if(hasReportAccess($DisputeConfigurationModule,1))
{	
	require_once "../../Lib/PHPClasses/configurationPanel.php";	
}
if(hasReportAccess($DisputeCategoryModule,1))
{	
	require_once "../../Lib/PHPClasses/dispute_categories.php";	
}
if(hasReportAccess($DisputeDashboardModule,1))
{	
	require_once "../../Lib/PHPClasses/DisputeDashboard.php";	
}
if(hasReportAccess($ReportRequestsModule,1))
{	
	//require_once "../ReportProcessing/ReportRequests.php";
    require_once "../../Lib/PHPClasses/DisputeReports.php";		
}

if(hasReportAccess($DisputeOwnershipModule,1))
{
 require_once "../../Lib/PHPClasses/Dispute_Ownership.php";	
}
if(hasReportAccess($DisputeEscalationStructure,1))
{
 require_once "../../Lib/PHPClasses/Escalation_Structure.php";	
}
if(hasReportAccess($DisputeEscalationRules,1))
{
 require_once "../../Lib/PHPClasses/EscalationRules.php";	
}
if(hasReportAccess($DisputeGroupLevel,1))
{
 require_once "../../Lib/PHPClasses/GroupDisputes.php";	
}
if(hasReportAccess($DisputeEmailConfiguration,1))
{
 require_once "../../Lib/PHPClasses/DisplayTemplate.php";	
}
if(hasReportAccess($DisputeAddInvoice,1))
{
 require_once "../../Lib/PHPClasses/AddNewInvoice.php";	
}
if(hasReportAccess($DisputeValidationInvoices,1))
{
 require_once "../../Lib/PHPClasses/ValidationInvoices.php";	
}
if(hasReportAccess($DisputeUserAccess,1))
{
 require_once "../../Lib/PHPClasses/UserAccess.php";	
}
if(hasReportAccess($DisputeUserGroups,1))
{
 require_once "../../Lib/PHPClasses/UserGroups.php";	
}
if(hasReportAccess($DisputeNewUser,1))
{
 require_once "../../Lib/PHPClasses/NewUser.php";
}
if(hasReportAccess($DisputeChangePassword,1))
{
 require_once "../../Lib/PHPClasses/ChangePassword.php";	
}
if(hasReportAccess($CustomInvoiceReportModule,1))
{
 require_once "../../Lib/PHPClasses/ExportInvoice.php";	
}
if(hasReportAccess($DisputeFaq,1))
{
 require_once "../../Pages/PHPCode/DisputeFaq.php";	
}
if(hasReportAccess($DisputeModuleAccess,1))
{
 require_once "../../Lib/PHPClasses/ModuleAccess.php";	
}
?>