'use strict'

import React from 'react'
import t from 'prop-types'

const UiContent = ({children}) => (
  <div className='ui-content'>{children}</div>
)

UiContent.propTypes = {
  children: t.any
}

export { UiContent }
