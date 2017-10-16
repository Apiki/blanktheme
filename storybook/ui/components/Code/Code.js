import React from 'react';
import Highlight from 'react-highlight';
import reactElementToJsxString from 'react-element-to-jsx-string';

const Code = ({children, lang}) => (
	<Highlight className={lang} languages={ [].push(lang) }>
		{reactElementToJsxString(
			children
		)}
	</Highlight>
);

export { Code };




// import React, { Component } from 'react';
// import hljs from 'highlight.js/lib/highlight';
// import reactElementToJsxString from 'react-element-to-jsx-string';

// class Code extends Component {
// 	componentDidMount() {
// 		this.mount();
// 	}

// 	componentDidUpdate() {
// 		this.mount();
// 	}

// 	mount() {
// 		const {className, langs, lang} = this.props;
// 		const nodes             = this.el.querySelectorAll('pre code');

// 		if ( lang ) {
// 			hljs.registerLanguage( lang, require( 'highlight.js/lib/languages/' + lang ) );
// 		}

// 		if ( ( langs.length === 0 ) && className ) {
// 			langs.push( className );
// 		}

// 		langs.forEach( lang => {
// 			hljs.registerLanguage( lang, require( 'highlight.js/lib/languages/' + lang ) );
// 		});

// 		for ( let i = 0; i < nodes.length; i++ ) {
// 			hljs.highlightBlock( nodes[i] );
// 		}
// 	}

// 	setEl = (el) => {
// 		this.el = el;
// 	};

// 	render() {
// 		const {
// 			children,
// 			className,
// 			element: Element,
// 			innerHTML
// 		}           = this.props;
// 		const props = { ref: this.setEl, className };

// 		if (innerHTML) {
// 			props.dangerouslySetInnerHTML = { __html: children };

// 			if ( Element ) {
// 				return <Element {...props} />;
// 			}
// 			return <div {...props} />;
// 		}

// 		if (Element) {
// 			return <Element {...props}>{children}</Element>;
// 		}

// 		return (
// 			<pre ref={this.setEl}>
// 				<code className={className}>
// 					{children}
// 				</code>
// 			</pre>
// 		);
// 	}
// }

// Code.defaultProps = {
//     innerHTML: false,
//     className: '',
// 	langs: [],
//     element: null,
// };

// export { Code };
