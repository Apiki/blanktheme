'use strict'

import React from 'react'
import { storiesOf } from '@storybook/react'
import { UiPage } from 'storybook-ui'
import colorStory from './stories/colors'

const stories = storiesOf('Styleguide', module)
const addStory = (description, callback) => (
  stories.add(description, () => (
    <UiPage title={description}>
      {callback()}
    </UiPage>
  ))
)

addStory('Styleguide Colors', () => (colorStory()))
