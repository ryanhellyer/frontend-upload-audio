<?php

$content .= '
<form enctype="multipart/form-data" action="http://arousingaudio.com/upload/" method="POST">

<!--
<form action="" method="post" enctype="multipart/form-data">
-->

	<p>
		<label>Upload a file</label>
		<input type="file" name="audio_upload[]" />
	</p>

	<p>
		<label>Describe your upload</label>
		<input name="audio-title" type="text" placeholder="Title" />
		<input name="audio-tagline" type="text" placeholder="Tagline: A short piece of text describing your upload" />
		<textarea name="audio-description" name="" placeholder="Add a description of your upload"></textarea>
	</p>

	<p>
		<fieldset>
			<legend>Genre</legend>

			<label>Jerkin\' around</label>
			<input name="audio-genre[]" value="jerkin-around" type="checkbox" />

			<br />

			<label>Girl fun</label>
			<input name="audio-genre[]" value="girl-fun" type="checkbox" />

			<br />

			<label>Boy to boy transaction</label>
			<input name="audio-genre[]" value="boy-to-boy" type="checkbox" />

		</fieldset>
	</p>

	<p>
		<input type="submit" value="Upload" />
	</p>

</form>
';
