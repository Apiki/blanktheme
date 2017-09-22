import React from 'react';
import { storiesOf } from '@storybook/react';
import reactElementToJSXString from 'react-element-to-jsx-string';
import Highlight from 'react-highlight';
import Component from 'utilities/component';

const CardPost = (props) => (
	<div className="card-post">
		{ ! props.hasImage ? '' :
		<figure className="card-thumbnail">
			<a href="#">
				<img src="https://unsplash.it/350/250"/>
			</a>
		</figure>
		}

		<div className="card-content">
			<h3 className="card-title"><a href="#">Hello World!</a></h3>

			<p>Lorem Ipsum é simplesmente uma simulação de texto
			   da indústria tipográfica e de impressos, e vem sendo
			   utilizado desde o século XVI,</p>
		</div>
	</div>
);

storiesOf( 'Cards', module )
	.add( 'card post', () => (
		<Component>
			<h2>Card Post</h2>

			<h3>Preview</h3>

			<CardPost hasImage={true} />

			<hr/>

			<h3>Usage</h3>

			<Highlight className="html">
				{reactElementToJSXString(
					<div class="card-post">
						<figure class="card-thumbnail">
							<a href="#">
								<img src="https://unsplash.it/350/250"/>
							</a>
						</figure>
						<div class="card-content">
							<h3 class="card-title"><a href="#">Hello World!</a></h3>

							<p>Lorem Ipsum é simplesmente uma simulação de texto
							da indústria tipográfica e de impressos, e vem sendo
							utilizado desde o século XVI,</p>
						</div>
					</div>
				, { tabStop: 4 } )}
			</Highlight>

			<hr/>

			<h3>Properties</h3>
			<p>The AgendaHighlight component has only one event project that receives an object with the following properties:</p>

			<table className="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<tr>
						<th>Property</th>
						<th>type</th>
						<th>Obs/inner props</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>eventUrl</td>
						<td>string</td>
						<td>-</td>
					</tr>
					<tr>
						<td>date</td>
						<td>object</td>
						<td>day, month, weekDay</td>
					</tr>
					<tr>
						<td>title</td>
						<td>string</td>
						<td>-</td>
					</tr>
					<tr>
						<td>organizer</td>
						<td>object</td>
						<td>image, name</td>
					</tr>
					<tr>
						<td>place</td>
						<td>string</td>
						<td>-</td>
					</tr>
				</tbody>
			</table>
		</Component>
	))
	.add( 'card post without image', () => (
		<Component>
			<h2>Card Post Without Image</h2>

			<h3>Preview</h3>

			<CardPost hasImage={ false } />

			<hr/>

			<h3>Usage</h3>

			<Highlight className="html">
				{reactElementToJSXString(
					<div class="card-post">
						<div class="card-content">
							<h3 class="card-title"><a href="#">Hello World!</a></h3>

							<p>Lorem Ipsum é simplesmente uma simulação de texto
							da indústria tipográfica e de impressos, e vem sendo
							utilizado desde o século XVI,</p>
						</div>
					</div>
				, { tabStop: 4 } )}
			</Highlight>
		</Component>
	));
