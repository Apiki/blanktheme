'use strict'

import React from 'react'
import { storiesOf } from '@storybook/react'

import { sectionStory } from './mock'

storiesOf('Section', module)
  .add('Section', () => (
    <div>
      {sectionStory()}
    </div>
  ))
