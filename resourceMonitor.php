<?php
$memory = shell_exec("free -m");
$outputMemory = explode(" ", $memory);
$CPU = substr(shell_exec("iostat -c"), 65);
$outputCPU = explode(" ", $CPU);
$disk = shell_exec("df -h -t rootfs");
$outputDisk = explode(" ", $disk);

echo '
	<html><div id="auto"><table id="rMonitTable1">
		<tr>
			<td>
				</br>
			</td>
			<td>
				'.ucfirst($outputMemory[27]).' (MB)
			</td>
			<td>
				'.ucfirst($outputMemory[20]).'
			</td>
		</tr>
		<tr>
			<td>
				RAM:
			</td>
			<td>
				'.$outputMemory[66].'
			</td>
			<td>
				'.$outputMemory[59] / 100 .'%
			</td>
		</tr>
	</table>
	<table id="rMonitTable2">
		<tr>
			<td>
				</br>
			</td>
			<td>
				'.ucfirst(substr($outputCPU[0], 1)).'
			</td>
			<td>
				'.ucfirst(substr($outputCPU[4], 1)).'
			</td>
			<td>
				'.ucfirst(substr($outputCPU[10], 1)).'
			</td>
		</tr>
		<tr>
			<td>
				CPU:
			</td>
			<td>
				'.$outputCPU[21].'%
			</td>
			<td>
				'.$outputCPU[29].'%
			</td>
			<td>
				'.$outputCPU[40].'%
			</td>
		</tr>
	</table>
	<table id="rMonitTable3">
		<tr>
			<td>
				</br>
			</td>
			<td>
				'.$outputDisk[8].'
			</td>
			<td>
				'.$outputDisk[9].'
			</td>
			<td>
				'.$outputDisk[10].'
			</td>
		</tr>
		<tr>
			<td>
				Disk:
			</td>
			<td>
				'.$outputDisk[25].'
			</td>
			<td>
				'.$outputDisk[28].'
			</td>
			<td>
				'.$outputDisk[31].'
			</td>
		</tr>
	</table></div>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
	$(document).ready( function() {
		setInterval(refresh, 250);
	});
	
	function refresh() {
			$("#auto").load(location.href + " #auto>*", "");
	}
	</script></html>';
?>
