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

The file which contains the short report has to follow this syntax:
</br>
</br>
<b>YYYYNNNs.php</b>
</br>
</br>

The "s" stands for "short".

Furthermore you have to set up the Configuration.php. There are several properties you have the define.

<h3>Properties</h3>
<ul>
<li>$report_dir = The folder where you save the reports</li>
<li>$image_dir = The folder where you save the images for the reports</li>
<li>$report_parameter = The parameter you want to use to adress the report</li>
<li>$headline_for_latest_events = The headline for the latest events</li>
<li>$event_page = The file where you want to show the reports</li>
</ul>

<h3>Latest reports</h3>
Then you can create an overview of your reports. For this you have to use the function getLatestReports($count) from LatestReports.php.
In the original version of phpReports you have to choose multiples of 3 for the parameter $count.
Otherwise you have to customize this php-file.

<h3>Link to full reports</h3>
Usually you want to link the overview of a report to the whole report. Therefore you have to add an php-file which handle the view of the whole report. The path to this file you have to set on the $event_page variable in Configuration.php. Furthermore you have to set the $report_parameter also in Configuration.php. This parameter you have to use when you call the $event_page.

<h3>Link to images of reports</h3>
In the view where you can see the whole report you may want to have a link to the images connected with this report. In this case you have to set the path of the general image-directory on the $image_dir variable in configuration.php. Images connected with the report have to copied at another folder inside the $image_dir with the name of the report (YYYYNNN).




