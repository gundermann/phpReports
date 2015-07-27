# phpReports
This is a php-framework to hanlde chronological sorted reports inside a website.

Originally phpReports is based on <a href="http://foundation.zurb.com/">foundation</a>. If you want to use any other web-framework you have to customize phpReports a bit.

# Usage
To use the management of phpReports each of your reports consists of two files. The first file is the short description of the report. The second is the full report. Additionally the names of these files has the following syntax:
</br>
</br>
<b>YYYYNNN.php</b>
</br>
</br>
<b>Y</b>: The year the report points to.</br>
<b>N</b>: The chronological number of the report in the year

Furthermore you have to set up the configuration.php. There are several properties you have the define.

<h3>Properties</h3>
<ul>
<li>$report_dir = The folder where you save the reports</li>
<li>$image_dir = The folder where you save the images for the reports</li>
<li>$report_parameter = The parameter you want to use to adress the report</li>
<li>$headline_for_latest_events = The headline for the latest events</li>
<li>$event_page = The file where you want to show the reports</li>
</ul>

Then you can create an overview of your reports. For this you have to use the function getLatestReports($count) from latestReports.php.
In the original version of phpReports you have to choose multiples of 3 for the parameter $count.
Otherwise you have to customize.



