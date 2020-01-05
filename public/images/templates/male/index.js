import populateList from '../Loader';



const beards = populateList([
							 '1',
							 '2', 
							 '3',
							 '4',
							 '5',
							 '5',
							 '6',
							 '7',
							 '8',
							 '9',
							 '10',
							 '11',
							 '12',
							 '13'
							 ], './male/beards');

const skins = populateList(['1',
							 '2', 
							 '3',
							 '4',
							 '5',
							 '6',
							 ], './male/skins');

const eyes = populateList(['1',
							'2', 
							'3',
							'4',
							'5',
							'6'
							 ], './male/eyes');

const hairs = populateList(['1',
							 '2', 
							 '3',
							 '4',
							 '5',
							 '6',
							 '7', 
							 '8',
							 '9',
							 '10',
							 '11',
							 '12', 
							 '13',
							 '14',
							 '15',
							 '16',
							 '17', 
							 '18',
							 '19',
							 '20', 
							 '21',
							 '22', 
							 '23',
							 '24',
							 '25',
							 '26',
							 '27', 
							 '28',
							 '29',
							 '30', 
							 '31',
							 '32', 
							 '33',
							 '34',
							 '35',
							 '36',
							 '37', 
							 '38',
							 '39',
							 '40', 
							 '41',
							 '42', 
							 '43',
							 '44',
							 '45'
							 ], './male/hairs');
// const hairs = populateList(['black',
// 							 'black', 
// 							 'black',
// 							 'black',
// 							 'brown',
// 							 'red',
// 							 'red', 
// 							 'brown',
// 							 'red',
// 							 'black',
// 							 ], './male/hairs');




export {
	beards,
	skins,
	hairs,
	eyes,
};
