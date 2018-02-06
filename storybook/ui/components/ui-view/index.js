'use strict'

import React from 'react'
import t from 'prop-types'
import './ui-view.scss'

const UiView = ({style, children, container}) => (
  <div className={`ui-view${container ? '--container' : ''}`} style={style}>{children}</div>
)

UiView.propTypes = {
  style: t.object,
  children: t.any,
  container: t.bool
}

export { UiView }
