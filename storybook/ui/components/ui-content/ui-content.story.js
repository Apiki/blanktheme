'use strict'

import React from 'react'
import { storiesOf } from '@storybook/react'
import { contentStory } from './mock'

storiesOf('Content', module)
  .add('Content', () => (
    <div>
      {contentStory()}
    </div>
  ))
