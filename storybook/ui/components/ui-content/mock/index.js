'use strict'

import React from 'react'
import { UiContent } from '../index'

export const contentStory = () => (
  <UiContent>
    <blockquote>
      <p>This is a standard paragraph created using the WordPress TinyMCE text editor.</p>
    </blockquote>

    <blockquote className='alert'>
      <p>This is a standard paragraph created using the WordPress TinyMCE text editor.</p>
    </blockquote>

    <p>
      This is a standard paragraph created using the WordPress TinyMCE text editor.
      It has a <strong>strong tag</strong>, an <em>em tag</em> and a <del>strikethrough</del>
      which is actually just the del element. There are a few more inline elements which are
      not in the WordPress admin but we should check for incase your users get busy with the
      copy and paste. These include <cite>citations</cite>, <abbr title='abbreviation'>abbr</abbr>,
      bits of <code>code</code> and <var>variables</var>, <q>inline quotations</q>,
      <ins dateTime='2011-12-08T20:19:53+00:00'>inserted text</ins>, text that is <s>no longer accurate</s>
      or something <mark>so important</mark> you might want to mark it. We can also style subscript and
      superscript characters like C0<sub>2</sub>, here is our 2<sup>nd</sup> example. If they are
      feeling non-semantic they might even use <b>bold</b>, <i>italic</i>, <big>big</big> or
      <small>small</small> elements too.&nbsp;Incidentally, these HTML4.01 tags have been given new life
      and semantic meaning in HTML5, you may be interested in reading this&nbsp;
      <a title='HTML5 Semantics' href='http://csswizardry.com/2011/01/html5-and-text-level-semantics'>article
      by Harry Roberts</a> which gives a nice excuse to test a link.&nbsp;&nbsp;It is also worth noting in
      the "kitchen sink" view you can also add <span style={{textDecoration: 'underline'}}>underline</span>&nbsp;
      styling and set <span style={{color: '#ff0000'}}>text color</span> with pesky inline CSS.
    </p>

    <p style={{textAlign: 'left'}}>
      Additionally, WordPress also sets text alignment with inline styles, like this left aligned paragraph.&nbsp;
      Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Cras mattis consectetur
      purus sit amet fermentum.
    </p>
    <p style={{textAlign: 'right'}}>
      This is a right aligned paragraph.&nbsp;Aenean eu leo quam. Pellentesque ornare sem lacinia quam
      venenatis vestibulum. Cras mattis consectetur purus sit amet fermentum.
    </p>
    <p style={{textAlign: 'justify'}}>
      This is a justified paragraph.&nbsp;Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis
      vestibulum. Cras mattis consectetur purus sit amet fermentum.
    </p>
    <p style={{paddingLeft: `${30}px`}}>
      Finally, you also have the option of an indented paragraph.&nbsp;Aenean eu leo quam. Pellentesque
      ornare sem lacinia quam venenatis vestibulum. Cras mattis consectetur purus sit amet fermentum.
    </p>
    <p>And last, and by no means least, users can also apply the <code>Address</code> tag to text like this:</p>
    <address>123 Example Street,
      Testville,
      West Madeupsburg,
      CSSland,
      1234
    </address>
    <p>...so there you have it, all our text elements</p>
  </UiContent>
)
