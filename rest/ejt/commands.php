<u>ETL Log Tracker :::  V a l i d  &nbsp; C o m m a n d s</u>
<p>Input Parameters [ s = Service , etl = Action ]</p>
<p>Example: elt/?s=el&a=list&qjid=2</p>

<fieldset>
<legend>Services List</legend>
<ol>
	<li>el => ETL Log Service</li>
</ol>
</fieldset>
<fieldset>
<legend>Actions List</legend>
<ol>
	<li>list => Get List [param 'jid']</li>
	<li>select => Get One [param 'jid' ]</li>
	<li>delete => Delete [param 'jid' ]</li>
	<li>update => update [param 'jid' ]</li>
	<li>add => Get One [param `user_id`, `domain`, `etl_job`, `operation`]</li>
</ol>
</fieldset>
<!-- 
INSERT INTO `etl_log`(`id`, `user_id`, `domain`, `etl_job`, `operation`, `start_time`, `end_time`, `status`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])
 -->