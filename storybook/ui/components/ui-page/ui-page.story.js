'use strict'

import React from 'react'
import { storiesOf } from '@storybook/react'

import { pageStory } from './mock'

storiesOf('Page', module)
  .add('Page', () => (
    <div>
      {pageStory()}
    </div>
  ))
