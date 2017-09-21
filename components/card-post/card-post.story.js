import React from 'react';
import { storiesOf } from '@storybook/react';
import Highlight from 'react-highlight';

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
		<div className="container-wrapper">
			<h1>Card Post</h1>

			<br/><br/>

			<CardPost hasImage={true} />

			<br/><br/>

			<Highlight>
			{`
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
			`}
			</Highlight>
		</div>
	))
	.add( 'card post without image', () => (
		<div className="container-wrapper">
			<h1>Card Post Without Image</h1>

			<br/><br/>

			<CardPost hasImage={ false } />

			<br/><br/>

			<Highlight>
			{`
			<div class="card-post">
				<div class="card-content">
					<h3 class="card-title"><a href="#">Hello World!</a></h3>

					<p>Lorem Ipsum é simplesmente uma simulação de texto
					da indústria tipográfica e de impressos, e vem sendo
					utilizado desde o século XVI,</p>
				</div>
			</div>
			`}
			</Highlight>
		</div>
	));
