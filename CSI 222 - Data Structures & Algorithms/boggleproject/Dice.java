package csinfo.carin.edu.BoggleGame;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collections;
// This class generates and shuffles the dice which have letters on each side. 
// It stores them in an ArrayList<ArrayList<String>>.
public class Dice {

	ArrayList<ArrayList<String>> dice = new ArrayList<ArrayList<String>>();
	 
	public Dice() {
		for(int i= 0; i<16; i++) {
			ArrayList<String> die1 = null;
			switch (i) {
			case 0: die1 = new ArrayList<String>(Arrays.asList("R","I","F","O","B","X"));break;
			case 1: die1 = new ArrayList<String>(Arrays.asList("I","F","E","H","E","Y"));break;
			case 2: die1 = new ArrayList<String>(Arrays.asList("D","E","N","O","W","S"));break;
			case 3: die1 = new ArrayList<String>(Arrays.asList("U","T","O","K","N","D"));break;
			case 4: die1 = new ArrayList<String>(Arrays.asList("H","M","S","R","A","O"));break;
			case 5: die1 = new ArrayList<String>(Arrays.asList("L","U","P","E","T","S"));break;
			case 6: die1 = new ArrayList<String>(Arrays.asList("A","C","I","T","O","A"));break;
			case 7: die1 = new ArrayList<String>(Arrays.asList("Y","L","G","K","U","E"));break;
			case 8: die1 = new ArrayList<String>(Arrays.asList("Qu","B","M","J","O","A"));break;
			case 9: die1 = new ArrayList<String>(Arrays.asList("E","H","I","S","P","N"));break;
			case 10: die1 = new ArrayList<String>(Arrays.asList("V","E","T","I","G","N"));break;
			case 11: die1 = new ArrayList<String>(Arrays.asList("B","A","L","I","Y","T"));break;
			case 12: die1 = new ArrayList<String>(Arrays.asList("E","Z","A","V","N","D"));break;
			case 13: die1 = new ArrayList<String>(Arrays.asList("R","A","L","E","S","C"));break;
			case 14: die1 = new ArrayList<String>(Arrays.asList("U","W","I","L","R","G"));break;
			case 15: die1 = new ArrayList<String>(Arrays.asList("P","A","C","E","M","D"));break;
			}//end of switch i
			dice.add(die1);
			
		}// End of For i 
		
	}// End of Dice
	//Shuffle or Randomize
	public void Shuffle() {
		Collections.shuffle(dice); //ArrayList.shuffle(dice);
		for (int i=0;i<16;i++)
		Collections.shuffle(dice.get(i));
	}// End of Shuffle		
	
	
	// Get values, parameter of what value you are looking for (0-15) then returns first character for that particular die.
	public String getValue(int i) {
		
		String a_letter = dice.get(i).get(0);
		return a_letter;
		
		//System.out.println( a_letter );
	}// End of getValue
	
	



}//End of Class
