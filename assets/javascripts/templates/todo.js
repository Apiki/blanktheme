riot.tag2('todo', '<h3>{opts.title}</h3><ul><li each="{item, i in items}">{item}</li></ul><form onsubmit="{add}"><input ref="input"><button>Add #{items.length + 1}</button></form>', 'h3 { font-size: 14px; }', '', function(opts) {
		this.items = []

		this.add = function(e) {
			e.preventDefault()
		}.bind(this)
});