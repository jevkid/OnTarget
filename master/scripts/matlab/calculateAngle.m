function r = calculateAngle()
	r = 'Test';
end

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
% Function: calculateAngle
%
% Called From: doVideoAnalysis, doImageAnalysis.
% Returns: an integer between 0 and 359 (Angle).
% Description: Takes an arrow and returns the angle from the target center when the target is flattened.
%
% PSEUDOCODE:
%
% calculateAngle(targetPos, arrow):
% 	# Flatten target to 90 deg corners using targetPos.
% 	# Find angle between x0,y0 and the arrow.
% 	return angle