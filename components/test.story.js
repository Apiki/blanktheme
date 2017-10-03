import React from 'react';
import { storiesOf } from '@storybook/react';
import { Page } from 'ui';

storiesOf( 'Test', module )
	.add( 'Page', () => (
		<Page>
			Hi
		</Page>
	))
;
