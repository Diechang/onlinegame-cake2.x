<?php if(!empty($specs)):?>
<table>
	<tbody>
		<tr class="head">
			<th colspan="2">必須環境</th>
		</tr>
	<?php foreach($specs as $spec):?>
		<?php if(!empty($spec["caption"])):?>
		<tr class="caption"><th colspan="2"><?php echo $spec["caption"]?></th></tr>
		<?php endif;?>
		<tr>
			<th>OS</th>
			<td><?php echo $spec["os_low"]?></td>
		</tr>
		<tr>
			<th>CPU</th>
			<td><?php echo $spec["cpu_low"]?></td>
		</tr>
		<tr>
			<th>メモリ</th>
			<td><?php echo $spec["memory_low"]?></td>
		</tr>
		<tr>
			<th>ディスク容量</th>
			<td><?php echo $spec["disc_low"]?></td>
		</tr>
		<tr>
			<th>グラフィック</th>
			<td><?php echo $spec["graphic_low"]?></td>
		</tr>
		<tr>
			<th>サウンド</th>
			<td><?php echo $spec["sound_low"]?></td>
		</tr>
		<tr>
			<th>ネットワーク</th>
			<td><?php echo $spec["network_low"]?></td>
		</tr>
		<tr>
			<th>ディスプレイ</th>
			<td><?php echo $spec["display_low"]?></td>
		</tr>
		<tr>
			<th>DirectX</th>
			<td><?php echo $spec["directx_low"]?></td>
		</tr>
		<tr>
			<th>その他</th>
			<td><?php echo $spec["other_low"]?></td>
		</tr>
		<tr>
			<th>更新日</th>
			<td colspan="2"><?php echo $this->Common->dateFormat($spec["modified"] , "date")?></td>
		</tr>
	</tbody>
	<?php endforeach;?>
	<tfoot>
		<tr>
			<td colspan="2">最新の動作環境は公式サイトにてご確認ください</td>
		</tr>
	</tfoot>
</table>
<?php else:?>
<p class="noData">動作環境データが登録されていません。<br>公式サイトで確認をお願いします。</p>
<?php endif;?>