package Database_Predction;

import weka.core.Attribute;
import weka.core.DenseInstance;
import weka.core.Instances;
import weka.classifiers.Classifier;
import weka.core.SerializationHelper;
import java.util.ArrayList;

public class First {
            
     public static void main(String[] args) {
    
          if (args.length < 3) {
            System.out.println("خطأ: لا توجد معطيات كافية");
            return;
        }
          try {
                int Quiz1val = Integer.parseInt(args[0]);
                int Mid1val = Integer.parseInt(args[1]);
                int Lab_Quizval = Integer.parseInt(args[2]);
           
               
                First sp = new First();
                double color = sp.predictcolor(Quiz1val, Mid1val, Lab_Quizval);
                System.out.println(Math.round(color));
            } catch (NumberFormatException e) {
                System.out.println("خطأ في نوع البيانات المدخلة, يجب ان تكون من ارقام فقط.");
            } catch (Exception e) {
                System.out.println("خطأ: " + e.getMessage());
            }
        }
            public double predictcolor(int Quiz1val,int Mid1val, int Lab_Quizval) {
            try {
                // تعريف السمات
                Attribute Quiz1 = new Attribute("Quiz1");
                Attribute Mid1 = new Attribute("Mid1");
                Attribute Lab_Quiz = new Attribute("Lab_Quiz");
                Attribute Color = new Attribute("Color");

                ArrayList attributes = new ArrayList();
                attributes.add(Quiz1);
                attributes.add(Mid1);
                attributes.add(Lab_Quiz);
                attributes.add(Color);

                // إنشاء مجموعة بيانات جديدة
                Instances dataset = new Instances("SecondePredictionDB", attributes, 0);
                dataset.setClassIndex(dataset.numAttributes() - 1);  
                
                DenseInstance instance = new DenseInstance(4);
                instance.setValue(Quiz1,Quiz1val);
                instance.setValue(Mid1,Mid1val);
                instance.setValue(Lab_Quiz,Lab_Quizval);

                // إضافة المثيل إلى مجموعة البيانات
                dataset.add(instance);

            Classifier cls = (Classifier) SerializationHelper.read("D:\\DB_Dataset_First\\DB_Dataset_First.model");

                double predictedcolor = cls.classifyInstance(dataset.instance(0));
                return predictedcolor;
            } catch (Exception e) {
                return -1; 
            } 
    } 
}
