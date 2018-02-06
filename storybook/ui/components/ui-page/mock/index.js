'use strict'

import React from 'react'
import { UiPage } from '../index'
import { UiSection } from '../../ui-section'
import { UiContent } from '../../ui-content'
import { UiView } from '../../ui-view'

export const pageStory = () => (
  <UiPage title='Storybook Docs'>
    <UiSection title='Introduction'>
      <UiContent>
        <p>You car use this components to documentation your <code>react</code> components,
        you only need to follow the hierarchy and everything will be done.</p>

        <blockquote className='alert'>
          If you not use the correct hierarchy, fatally, your component or code will be <strong>broke</strong>.
        </blockquote>

        <p>Este é um texto dentro do the-content</p>

        <UiView>
          <p>Este é um view dentro do the-content</p>
        </UiView>
      </UiContent>

      <UiView>
        This is a view wrapper
      </UiView>
    </UiSection>
    <UiContent>
      <p>You car use this components to documentation your <code>react</code> components,
      you only need to follow the hierarchy and everything will be done.</p>

      <blockquote className='alert'>
        If you not use the correct hierarchy, fatally, your component or code will be <strong>broke</strong>.
      </blockquote>

      <UiView>
        This is a view wrapper
      </UiView>
    </UiContent>
  </UiPage>
)
