const extract = (obj) => {
	let data = [];

	Object.keys( obj ).map( item => {
		data.push({
			key: item,
			value: obj[item]
		});
	});

	return data;
};

export { extract };
