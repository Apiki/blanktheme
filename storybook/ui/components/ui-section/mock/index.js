'use strict'

import React from 'react'
import { UiSection } from '../index'

export const sectionStory = () => (
  <UiSection title='This is the section title'>
    <div className='ui-content'>
      <p>this is a paragraph inside <code>vue-cli</code> section</p>
      <p>this is a paragraph inside section <a href='#'>lorem ipsum</a></p>
    </div>

    <div className='view-component'>
      lorem ipsum simet dolar
    </div>
  </UiSection>
)
