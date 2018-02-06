'use strict'

import React from 'react'
import { storiesOf } from '@storybook/react'

import { typeStory } from './mock'

storiesOf('Type', module)
  .add('Default', () => (
    <div>
      {typeStory()}
    </div>
  ))
