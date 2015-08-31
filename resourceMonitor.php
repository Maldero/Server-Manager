<?php
$memory = shell_exec("free -m");
$outputMemory = explode(" ", $memory);
$CPU = substr(shell_exec("iostat -c"), 65);
$outputCPU = explode(" ", $CPU);
$disk = shell_exec("df -h -t rootfs");
$outputDisk = explode(" ", $disk);

echo '
	<html><div id="auto"><table id="memory">
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
	<table>
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
	<table>
		<tr>
			<td>
				</br>
			</td>
			<td>
				'.$outputDisk[6].'
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
				'.$outputDisk[23].'
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
		$(\'#auto\').load(\'resourceMonitor.php\');
		refresh();
	});
	
	function refresh() {
		setTimeout( function() {
			$(\'#auto\').load(\'resourceMonitor.php\');
		}, 100000000000);
	}
	</script></html>';
?>
