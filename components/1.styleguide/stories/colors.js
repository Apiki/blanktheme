'use strict'

import React from 'react'
import { UiSection } from 'storybook-ui'
import { ColorUi } from '../components/color-ui'
import sassToJs from 'sass-to-js'
import extractParams from '../utils/extract'

const colors = extractParams(sassToJs(
  document.getElementById('root'),
  {pseudoEl: ':after', cssProperty: 'content'}
))

export default () => (
  <div>
    <UiSection title='Preview'>
      {colors.map((c, key) => (
        <ColorUi key={key} colors={c} />
      ))}
    </UiSection>
  </div>
)
