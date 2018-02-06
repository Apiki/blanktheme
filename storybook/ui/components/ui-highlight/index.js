'use strict'

import React, { PureComponent } from 'react'
import t from 'prop-types'
import Prism from 'prismjs'
import './ui-highlight.scss'

class UiHighlight extends PureComponent {
  componentDidMount () {
    this._hightlight()
  }

  componentDidUpdate () {
    this._hightlight()
  }

  _hightlight () {
    Prism.highlightElement(this._domNode, this.props.async)
  }

  _handleRefMount = domNode => {
    this._domNode = domNode
  }

  render () {
    const { className, component: Wrapper, children } = this.props

    return (
      <div className='ui-highlight'>
        <Wrapper ref={this._handleRefMount} className={className}>
          {children}
        </Wrapper>
      </div>
    )
  }
}

UiHighlight.defaultProps = {
  component: `code`
}

UiHighlight.propTypes = {
  async: t.bool,
  className: t.string,
  children: t.any,
  component: t.node
}

export { UiHighlight }
