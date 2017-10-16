import React from 'react';
import {
	Header,
	Section
} from 'ui';

const Page = ({title, children}) => (
	<div className="ui-page">
		<Header title={title} />

		<Section>
			{children}
		</Section>
	</div>
);

export { Page };
