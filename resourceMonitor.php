<?php
if(!isset($_SESSION['logged']))
	header("Location: index.php");

$memory = shell_exec("free -m");
$outputMemory = explode(" ", $memory);
$CPU = shell_exec("iostat -c");
$outputCPU = explode(" ", $CPU);
$disk = shell_exec("df -h -t rootfs");
$outputDisk = explode(" ", $disk);

echo '
	<table id="memory">
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
				'.ucfirst(substr($outputCPU[7], 1)).'
			</td>
			<td>
				'.ucfirst(substr($outputCPU[11], 1)).'
			</td>
			<td>
				'.ucfirst(substr($outputCPU[17], 1)).'
			</td>
		</tr>
		<tr>
			<td>
				CPU:
			</td>
			<td>
				'.$outputCPU[28].'%
			</td>
			<td>
				'.$outputCPU[36].'%
			</td>
			<td>
				'.$outputCPU[47].'%
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
	</table>';
?>
