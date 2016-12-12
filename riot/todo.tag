<todo>

	<h3>{ opts.title }</h3>

	<ul>
		<li each={ item, i in items }>{ item }</li>
	</ul>

	<form onsubmit={ add }>
		<input ref="input">
		<button>Add #{ items.length + 1 }</button>
	</form>

	<style>
		h3 {
			font-size: 14px;
		}
	</style>

	<script>
		this.items = [];

		add(e) {
			e.preventDefault();
		}
	</script>

</todo>