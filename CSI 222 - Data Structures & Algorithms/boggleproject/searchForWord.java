package csinfo.carin.edu.BoggleGame;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.stream.Collectors;

import javax.swing.JButton;
// This class specifies how the computer is to find words in the instance of the game board.( You want to make the computer player less efficient so that the user has a chance at winning. )
public class searchForWord {
		int min_wordLength = 3;
		int max_wordLength = 8;
		public wordList wordlist = new wordList();
	    private final String[][] gridButtons;

	    public searchForWord(JButton[][] array) {
	    	//Gets the instance of the current game board. 
	        int length = array.length;
	        this.gridButtons = new String[length][length];
	        //String[][] result = Arrays.copy(array, length);
	        for (int i = 0; i < length; i++) {
	        	for (int j = 0; j < length; j++) {
	        		this.gridButtons[i][j] = array[i][j].getText();
	        	}
	        }
	    }

	    public String[][] getGrid() {
	        return this.gridButtons;
	    }

	
	private ArrayList<String> computerWords;
	//private JButton[][] gridButtons;
	private final int Board_size = 4 ; //Width and height of the grid
	//The method of having the computer searching through the board, is not efficient but I wanted to make sure that the user can win. 
	public boolean contains() {
	    return verticalContains(gridButtons)
	            || horizontalContains(gridButtons)
	            || diagonalContains(gridButtons);	
	}
	//In the next three methods, the computer will search vertical,horizontal, and diagonally for words in both directions. It will then check the strings with the word list or dictionary and then if it is a word will 
	// submit it to the computerWords array. if not then it will not move it to the computerWords array. 
	//Checks vertical cells
	private boolean verticalContains(String[][] grid) {
	    for (String[] row : grid) {
	        if (wordlist.contains (Arrays.stream(row).collect(Collectors.joining(" ")))) {
	        	computerWords.add(Arrays.stream(row).collect(Collectors.joining(" ")));
                return true;
                
	        }
	        if (wordlist.contains (new StringBuilder(Arrays.stream(row).collect(Collectors.joining(" "))).reverse().toString())) {
	        	computerWords.add(new StringBuilder(Arrays.stream(row).collect(Collectors.joining(" "))).reverse().toString());
                return true;
                
	        }
	    }
	    return false;
	}
	//Checks horizontal cells
	private boolean horizontalContains(String[][] grid) {
	   // int wordLength = word.length();
	   // int max = grid.length - wordLength;
	    String[] wordArray = new String [4];
	    for (int i = 0; i < Board_size; i++) {
	    	wordArray[i]= grid [0][i];
	    
	    
	                if(wordlist.contains (Arrays.stream(wordArray).collect(Collectors.joining(" ")))) {
	    	        	computerWords.add(Arrays.stream(wordArray).collect(Collectors.joining(" ")));
	                return true;
	                }//for if right above
	            } // for l
	    for (int i = 0; i < Board_size; i++) {
	    	wordArray[i]= grid [1][i];
	    
	    
	                if(wordlist.contains (Arrays.stream(wordArray).collect(Collectors.joining(" ")))) {
	    	        	computerWords.add(Arrays.stream(wordArray).collect(Collectors.joining(" ")));
	                return true;
	                }//for if right above
	            } // for l
	    
	    for (int i = 0; i < Board_size; i++) {
	    	wordArray[i]= grid [2][i];
	    
	    
	                if(wordlist.contains (Arrays.stream(wordArray).collect(Collectors.joining(" ")))) {
	    	        	computerWords.add(Arrays.stream(wordArray).collect(Collectors.joining(" ")));
	                return true;
	                }//for if right above
	            } // for l
	    
	    for (int i = 0; i < Board_size; i++) {
	    	wordArray[i]= grid [3][i];
	    
	    
	                if(wordlist.contains (Arrays.stream(wordArray).collect(Collectors.joining(" ")))) {
	    	        	computerWords.add(Arrays.stream(wordArray).collect(Collectors.joining(" ")));
	                return true;
	                }//for if right above
	            } // for l
	    
	    for (int i = 0; i < Board_size; i++) {
	    	wordArray[i]= grid [i][0];
	    
	    
	                if(wordlist.contains (Arrays.stream(wordArray).collect(Collectors.joining(" ")))) {
	    	        	computerWords.add(Arrays.stream(wordArray).collect(Collectors.joining(" ")));
	                return true;
	                }//for if right above
	            } // for l
	    for (int i = 0; i < Board_size; i++) {
	    	wordArray[i]= grid [i][1];
	    
	    
	                if(wordlist.contains (Arrays.stream(wordArray).collect(Collectors.joining(" ")))) {
	    	        	computerWords.add(Arrays.stream(wordArray).collect(Collectors.joining(" ")));
	                return true;
	                }//for if right above
	            } // for l
	    
	    for (int i = 0; i < Board_size; i++) {
	    	wordArray[i]= grid [i][2];
	    
	    
	                if(wordlist.contains (Arrays.stream(wordArray).collect(Collectors.joining(" ")))) {
	    	        	computerWords.add(Arrays.stream(wordArray).collect(Collectors.joining(" ")));
	                return true;
	                }//for if right above
	            } // for l
	    
	    for (int i = 0; i < Board_size; i++) {
	    	wordArray[i]= grid [i][3];
	    
	    
	                if(wordlist.contains (Arrays.stream(wordArray).collect(Collectors.joining(" ")))) {
	    	        	computerWords.add(Arrays.stream(wordArray).collect(Collectors.joining(" ")));
	                return true;
	                }//for if right above
	            } // for l
	    
	    return false;
	}
	
	public ArrayList<String> getComputerWords() {
		return computerWords;
	}

	public void setComputerWords(ArrayList<String> computerWords) {
		this.computerWords = computerWords;
	}

	//Checks diagonal cells
	private boolean diagonalContains(String[][] grid) {
	   //int wordLength = word.length();
	    String[] wordArray = new String [4];
	    for (int i = 0; i < Board_size; i++) {
	    	wordArray[i]= grid [i][i];
	    
	    
	                if(wordlist.contains (Arrays.stream(wordArray).collect(Collectors.joining(" ")))) {
	    	        	computerWords.add(Arrays.stream(wordArray).collect(Collectors.joining(" ")));
	                return true;
	                }//for if right above
	            } // for l
	    for (int i = 0; i < Board_size; i++) {
	    	wordArray[i]= grid [(Board_size - 1) - i][(Board_size - 1) - i];
	    
	    
	                if(wordlist.contains (Arrays.stream(wordArray).collect(Collectors.joining(" ")))) {
	    	        	computerWords.add(Arrays.stream(wordArray).collect(Collectors.joining(" ")));
	                return true;
	                }//for if right above
	            } // for l
	    
	    for (int i = 0; i < Board_size; i++) {
	    	wordArray[i]= grid [(Board_size - 1) - i][i];
	    
	    
	                if(wordlist.contains (Arrays.stream(wordArray).collect(Collectors.joining(" ")))) {
	    	        	computerWords.add(Arrays.stream(wordArray).collect(Collectors.joining(" ")));
	                return true;
	                }//for if right above
	            } // for l
	    
	    for (int i = 0; i < Board_size; i++) {
	    	wordArray[i]= grid [i][(Board_size - 1) - i];
	    
	    
	                if(wordlist.contains (Arrays.stream(wordArray).collect(Collectors.joining(" ")))) {
	    	        	computerWords.add(Arrays.stream(wordArray).collect(Collectors.joining(" ")));
	                return true;
	                }//for if right above
	            } // for l
	    
	       
	    return false;
	} // method diagonalContains()
} // class searchForWord
