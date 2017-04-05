<select2>

	<select name={ opts.name } multiple={ opts.multiple } ref="select">
		<yield/>
	</select>

	<script>
		this.on( 'mount', function() {
			jQuery( this.refs.select ).select2( opts.attr );
		});
	</script>

</select2>
