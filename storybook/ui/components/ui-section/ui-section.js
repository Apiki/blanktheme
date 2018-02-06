'use strict'

import React from 'react'
import t from 'prop-types'

const UiSection = ({title, children}) => (
  <section className='ui-section'>
    {title && (
      <header className='ui-section__header'>
        <h2 className='ui-section__title'>{title}</h2>
      </header>
    )}

    <div className='ui-section__content'>
      {children}
    </div>
  </section>
)

UiSection.propTypes = {
  title: t.string.isRequired,
  children: t.any
}

export { UiSection }
