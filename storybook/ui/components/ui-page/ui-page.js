'use strict'

import React from 'react'
import t from 'prop-types'

const UiPage = ({title, children}) => (
  <div className='ui-page'>
    {title && (
      <header className='ui-page__header'>
        <h1 className='ui-page__title'>{title}</h1>
      </header>
    )}

    <div className='ui-page__content'>
      {children}
    </div>
  </div>
)

UiPage.propTypes = {
  title: t.string.isRequired,
  children: t.any
}

export { UiPage }
