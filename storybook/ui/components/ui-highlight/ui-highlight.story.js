'use strict'

import React from 'react'
import { storiesOf } from '@storybook/react'
import { UiHighlight } from './index'
import 'prismjs/themes/prism.css'

storiesOf('Highlight', module)
  .add('Default', () => (
    <div>
      <UiHighlight component='pre' className='language-markup'>
        {`
        <!DOCTYPE html>
          <html lang="en">
            <head>
              <script>
                // Just a lil’ script to show off that inline JS gets highlighted
                window.console && console.log('foo');
              </script>
              <meta charset="utf-8" />
              <link rel="shortcut icon" href="favicon.png" />
              <title>Prism</title>
              <link rel="stylesheet" href="style.css" />
              <link rel="stylesheet" href="themes/prism.css" data-noprefix />
              <script src="prefixfree.min.js"></script>
              <script>var _gaq = [['_setAccount', 'UA-33746269-1'], ['_trackPageview']];</script>
              <script src="http://www.google-analytics.com/ga.js" async></script>
            </head>
            <body></body>
          </html>
        `}
      </UiHighlight>
    </div>
  ))
